
$(document).ready(function(){
    $('#userName').keyup(function(){
        let username = $(this).val();
        // $('#messageUsername').html($username);
        // AJAX:
        $.post(
            "../Ajax/checkUsername", // URL to get data
            {userName: username}, // userName is from $_POST["userName"]. username is from $username = $(this).val();
            function(data) { // callback to return data
                if(data == 'true') {
                    let notification = "* Username đã được sử dụng";
                    $('#messageUsername').html(notification);
                } else { $('#messageUsername').empty(); }

            } 
        );
    });

    

});