function refresh(element) {
    $(element).load(document.URL +  ' '+element);
}


// jQuery
$(document).ready(function () {

    // Adding a comment with AJAX
    $('.post').on('click', '.btn-comment', function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        var body = $('#comment'+id).val();

        $.ajax({
            url: 'insert_comment_ajax?id='+id+'&body='+body,
            success: function(){
                console.log('successful, id='+id+' body = '+body);
                refresh('#commentsDiv'+id);
            },
            error: function(xhr, textStatus, errorThrown){
                alert(errorThrown);
            }
        });
        // Delete a comment with AJAX
    }).on('click', '.btn-deleteComment', function (event) {
        event.preventDefault();
        var postId = $(this).data('postid');
        var commId = $(this).data('commentid');
        $.ajax({
            url: 'delete_comment_ajax?id='+commId,
            success: function(){
                console.log('successful, post id='+postId+' comment id= '+commId);
                refresh('#commentsDiv'+postId);
            }
        });
    });

});