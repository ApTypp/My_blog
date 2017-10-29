function refresh(element) {
    $(element).load(document.URL +  ' '+element);
}

$(document).ready(function () {

    $('.post').on('click', '.btn-comment', function () {
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
    });
});