
$(document).ready(function() {
   
            $('#search-input').click(function() {
                    
                    $.ajax({
                            type : 'POST',
                            data : {'action' : 'autocomplete_getposts'},
                            url : AJAX.url,
                            success : function (output){
                                console.log(output);
                                 
                            },
                            error: function () {
                                 console.log('Co loi xay ra');
                            }
                    });
               
            });
    /*$('input[name=\'category\']').autocomplete({
    	'source': function(request, response) {
    		$.ajax({
    			url: 'index.php?route=catalog/category/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
    			dataType: 'json',			
    			success: function(json) {
    				response($.map(json, function(item) {
    					return {
    						label: item['name'],
    						value: item['category_id']
    					}
    				}));
    			}
    		});
    	},
    	'select': function(item) {
    		$('input[name=\'category\']').val('');
    		
    		$('#product-category' + item['value']).remove();
    		
    		$('#product-category').append('<div id="product-category' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="product_category[]" value="' + item['value'] + '" /></div>');	
    	}
    });*/
});

