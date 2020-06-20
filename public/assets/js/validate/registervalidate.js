$('document').ready(function(){

    var userlen_min = 4;
    var userlen_max = 12;
    var password_len = 8;

    // #region validation rules
    $('#registration_form').validate({
        rules: {
            username: {
                required: true,
                maxlength: userlen_max,
                minlength: userlen_min
            },
            email: {
                required: true,
                email: true
            },
            email_con: {
                email:true,
                required: true,
                equalTo: "#email"
            },
            password: {
                required: true,
                minlength: password_len
            },
            password_con: {
                required: true,
                equalTo: "#password"
            },
            formCheck: {
                required: true
            },
        }
    });
    // #endregion

    // #region focusout elements for validation
    $( "#username" ).on('input' , function(e)
    {
            if( $('#username').valid() )
            {
                $("#username").removeClass("is-invalid");
            }
            else{
                $("#username").addClass("is-invalid");
            }
    })

    $( "#email" ).focusout(function(e)
    {
        if( $('#email').valid() ) {
           $("#email").removeClass("is-invalid");
        }
        else{
            $("#email").addClass("is-invalid");
        }
    })

    $( "#email_con" ).focusout(function(e)
    {
        if( $('#email_con').valid() ) {
            $("#email_con").removeClass("is-invalid");
        }
        else{
            $("#email_con").addClass("is-invalid");
        }
    })

    $( "#password" ).on('input' , function(e)
    {
        if( $('#password').val().lenght > password_len)
        {
            if( $('#password').valid() ){
                $("#password").removeClass("is-invalid");
            }
            else{
                $("#password").addClass("is-invalid");
            }
        }
    })

    $( "#password_con" ).on('input' , function(e)
    {
            if( $('#password_con').valid() ){
                $("#password_con").removeClass("is-invalid");
            }
            else{
                $("#password_con").addClass("is-invalid");
            }

    })
    // #endregion
});
