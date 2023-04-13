$(document).ready(function(){
    $('.deleteCmtBtn').click(function(){
        let commentID = $(this).attr('id');
        $('#cmtID').val(commentID);
    });

    $('.editCmtBtn').click(function(){
        let newCommentContent = $(this).val();
        let commentID = $(this).attr('id');
        $('#newCommentContent').val(newCommentContent);
        $('#commentID').val(commentID);
    });

});