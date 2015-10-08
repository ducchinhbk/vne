$(document).ready(function () { 
    $('#editor').trumbowyg();
     
	$('#post_category').change(function(){
	   
       var cate_id = $('#post_category').val();
       
       $.ajax({
            url : "<?php echo base_url('ajax/c_get_post_categories'); ?>",
            type: "POST",
            dateType: "html",
            data : {cate_id : cate_id },
            
            success : function (result){
                $('#post_category').append(result);
            }
       });

	});
});