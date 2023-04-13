
$(document).ready(function(){
    $('.deleteCateBtn').click(function(){
        let deleteCateID = $(this).val();
        $('#delete-cate-id').val(deleteCateID);
    });

    $('.deleteNewsBtn').click(function(){
        let deleteNewsID = $(this).val();
        $('#delete-news-id').val(deleteNewsID);
    });

    $('.restoreNewsBtn').click(function(){
        let restoreID = $(this).val();
        $('#restore-id').val(restoreID);
        $('#restore-form').submit();
    });

    $('.PermDelNewsBtn').click(function() {
        let permanentlyDelID = $(this).val();
        $('#perm-delete-news-id').val(permanentlyDelID);
    })
});