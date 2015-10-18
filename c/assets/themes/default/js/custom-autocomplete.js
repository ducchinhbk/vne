// Autocomplete */
(function($) {
    $.fn.autocomplete = function(option) {
        return this.each(function() {
            this.timer = null;
            this.items = new Array();
            this.currentPressDown = 0;
            this.index = 0;

            $.extend(this, option);
            $(this).attr('autocomplete', 'off');

            // Focus
            $(this).on('focus', function() {
                this.request();
            });

            // Blur
            $(this).on('blur', function() {
                setTimeout(function(object) {
                    object.hide();
                }, 200, this);
            });

            // Keydown
            $(this).on('keydown', function(event) {
                switch(event.keyCode) {
                    case 8 : // backspace
                        if($(this).val() == ''){
                            var lastLi = $(this).parent().find('ul.select2-choices li:last-child');
                            if($(lastLi).css('background-color') == 'rgb(0, 0, 255)'){
                                $(lastLi).remove();
                            }else{
                                $(lastLi).css('background-color', 'blue');
                            }
                        }
                        break;
                    case 13: // enter
                        var value = '';
                        if($(this).parent().find('ul.dropdown-menu :eq('+ this.index*2 + ')').css('background-color') == 'rgb(240, 240, 240)'){
                            value = $(this).parent().find('ul.dropdown-menu :eq('+ this.index*2 + ') a:first-child').html();
                        }
                        if(value == ''){
                            break;
                        }
                        var html = '<li class="select2-search-choice">'+
                            '<div>'+ value + '</div>'+
                            '<a tabindex="-1" class="select2-search-choice-close" href="#"></a>'+
                            '</li>';
                        $(this).parent().find('ul.select2-choices').append(html);
                        break;
                    case 40: // down arrow
                        this.currentPressDown++;
                        this.index = this.currentPressDown % $(this).parent().find('ul.dropdown-menu li').length;
                        $(this).parent().find('ul.dropdown-menu li').css('background-color', '');
                        $(this).parent().find('ul.dropdown-menu :eq('+ this.index*2 + ')').css('background-color', 'rgb(240, 240, 240)');
                        break;
                    case 38: // up arrow
                        this.currentPressDown--;
                        this.index = this.currentPressDown % $(this).parent().find('ul.dropdown-menu li').length;
                        $(this).parent().find('ul.dropdown-menu li').css('background-color', '');
                        $(this).parent().find('ul.dropdown-menu :eq('+ this.index*2 + ')').css('background-color', 'rgb(240, 240, 240)');
                        break;
                    case 27: // escape
                        this.hide();
                        break;
                    default:
                        this.request();
                        break;
                }
            });

            // Click
            this.click = function(event) {
                event.preventDefault();

                value = $(event.target).parent().attr('data-value');

                if (value && this.items[value]) {
                    this.select(this.items[value]);
                }
            }

            // Show
            this.show = function() {
                var pos = $(this).position();

                $(this).siblings('ul.dropdown-menu').css({
                    top: pos.top + $(this).outerHeight(),
                    left: pos.left
                });

                $(this).siblings('ul.dropdown-menu').show();
            }

            // Hide
            this.hide = function() {
                $(this).siblings('ul.dropdown-menu').hide();
            }

            // Request
            this.request = function() {
                clearTimeout(this.timer);

                this.timer = setTimeout(function(object) {
                    object.source($(object).val(), $.proxy(object.response, object));
                }, 200, this);
            }

            // Response
            this.response = function(json) {
                html = '';

                if (json.length) {
                    for (i = 0; i < json.length; i++) {
                        this.items[json[i]['value']] = json[i];
                    }

                    for (i = 0; i < json.length; i++) {
                        if (!json[i]['category']) {
                            html += '<li data-value="' + json[i]['value'] + '"><a href="#">' + json[i]['label'] + '</a></li>';
                        }
                    }

                    // Get all the ones with a categories
                    var category = new Array();

                    for (i = 0; i < json.length; i++) {
                        if (json[i]['category']) {
                            if (!category[json[i]['category']]) {
                                category[json[i]['category']] = new Array();
                                category[json[i]['category']]['name'] = json[i]['category'];
                                category[json[i]['category']]['item'] = new Array();
                            }

                            category[json[i]['category']]['item'].push(json[i]);
                        }
                    }

                    for (i in category) {
                        html += '<li class="dropdown-header">' + category[i]['name'] + '</li>';

                        for (j = 0; j < category[i]['item'].length; j++) {
                            html += '<li data-value="' + category[i]['item'][j]['value'] + '"><a href="#">&nbsp;&nbsp;&nbsp;' + category[i]['item'][j]['label'] + '</a></li>';
                        }
                    }
                }

                if (html) {
                    this.show();
                } else {
                    this.hide();
                }

                $(this).siblings('ul.dropdown-menu').html(html);
            }

            $(this).after('<ul class="dropdown-menu"></ul>');
            $(this).siblings('ul.dropdown-menu').delegate('a', 'click', $.proxy(this.click, this));

        });
    }
})(window.jQuery);