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

    $('.post').on('click','.btn-delpost', function (event) {
        event.preventDefault();
       var id = $(this).data('id');
       $.ajax ({
           url: 'delete_post?id='+id+'&ajax=1',
           success: function () {
               refresh('#posts');
           }

       })

    });

        // Upvote button
    $('.vote').on('click', '.btn-upvote', function () {
        var id = $(this).data('id');
        var downvote = $('#btn-downvote-'+id);
        var uvselected = $(this).data('selected');
        var dvselected = downvote.data('selected');
        var count = $('#votecount'+id).text();
        if (dvselected === 0) {
            $(this).addClass('text-success');
            $(this).data('selected', 1);
            if (uvselected === 0){
                $('#votecount'+id).text(++count);
            }
        } else {
            downvote.data('selected',0);
            downvote.removeClass('text-danger');
            $('#votecount'+id).text(++count);
        }
        $.ajax ({
            url: 'vote?count='+count+'&uvselected='+$(this).data('selected')+'&dvselected='+downvote.data('selected')+'&id='+id
        });
        // Downvote button
    }).on('click','.btn-downvote', function () {
        var id = $(this).data('id');
        var upvote = $('#btn-upvote-'+id);
        var uvselected = upvote.data('selected');
        var dvselected = $(this).data('selected');
        var count = $('#votecount'+id).text();
        if (uvselected === 0) {
            $(this).addClass('text-danger');
            $(this).data('selected', 1);
            if (dvselected === 0){
                $('#votecount'+id).text(--count);
            }
        } else {
            upvote.data('selected',0);
            upvote.removeClass('text-success');
            $('#votecount'+id).text(--count);
        }
        $.ajax ({
            url: 'vote?count='+count+'&dvselected='+$(this).data('selected')+'&uvselected='+upvote.data('selected')+'&id='+id
        });
    })

});