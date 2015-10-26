
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
                g('Co loi xay ra');
            }
        });
               
   });
   
   $('#load-reviews').click(function() {
    
        var post_id = $('#post-id').val();
        
        var last_date = $('.lastpost_date:last').val();
        $.ajax({
            type : 'POST',
            data : {'action' : 'get_comments_ajax', 'post_id':post_id, 'last_date': last_date,},
            url : AJAX.url,
            success : function (output){
                //console.log(output);
                if(output == 'no comment'){
                    $('#comments-list').append('<li> <p style="text-align: center; margin:20px 0; "> Không còn bình luận để hiển thị.. </p></li>');
                    $('#load-reviews').remove();
                }
                else{
                    $('#comments-list').append(output); 
                }
                                
            },
            error: function () {
                g('Co loi xay ra');
            }
        });
               
   });
   
   //handle review form submit
   $('#review-form').click(function() {
        
        var user_id = $('#user-id').val();
        var post_id = $('#post-id').val();
        var rate = $('#rating-index').val();
        var comment_content = $('#commnent-content').val();
        
        if(comment_content.length > 0 && rate.length > 0 ) {
            $.ajax({
                type : 'POST',
                data : {'action' : 'add_review_rating', 'user_id':user_id, 'post_id': post_id, 'rate': rate, 'comment_content': comment_content},
                url : AJAX.url,
                success : function (output){
                    if(output == 'success')
                    {
                        alert('Bình luận của bạn đã gửi thành công!');
                        location.reload();
                    }
                                    
                },
                error: function () {
                    alert('Có lỗi xảy ra, vui lòng thử lại..');
                }
            });
        }
        else{
            alert('Bạn vui lòng điền đủ thông tin..');
        }       
   });
   
});

