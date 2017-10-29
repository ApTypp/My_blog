$(document).ready(function () {

    $('.post').on('click', '.btn-comment', function () {
        var id = $(this).data('id');
        var body = $('#comment'+id).val();

        $.ajax({
            url: 'insert_comment_ajax?id='+id+'&body='+body,
            success: function(){
                console.log('successful, id='+id+' body = '+body);
                $('#commentsDiv'+id).load(document.URL +  ' #commentsDiv'+id);
            },
            error: function(xhr, textStatus, errorThrown){
                alert(errorThrown);
            }
        });
    });
});