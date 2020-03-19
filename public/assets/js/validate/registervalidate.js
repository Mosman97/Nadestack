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

    // #region functions
    $('#submit_btn').on('click',function(evt) 
    {
        var valid = $("#registration_form").validate();
        if ( valid.valid()){
            alert("geht");
            //PHP Aufruf
        }
    });
    // #endregion

    // #region focusout elements for validation
    var un_counter = 0;
    $( "#username" ).on('input' , function(e) 
    {
        un_counter++;
        if(un_counter > userlen_min - 1)
        {
            if( $('#username').valid() )
            {
                $("#username").addClass("is-valid");
                $("#username").removeClass("is-invalid");
            }
            else{
                $("#username").addClass("is-invalid");
                $("#username").removeClass("is-valid");
            }
        }
    })

    $( "#email" ).focusout(function(e) 
   
    {
        if( $('#email').valid() )
        {   
            
           $("#email").removeClass("is-invalid");
           $("#email").addClass("is-valid");
         
        }
        else{
            $("#email").addClass("is-invalid");
            $("#email").removeClass("is-valid");
        }
    })

    $( "#email_con" ).focusout(function(e) 
    {
        if( $('#email_con').valid() )
        {
            $("#email_con").addClass("is-valid");
            $("#email_con").removeClass("is-invalid");
        }
        else{
            $("#email_con").addClass("is-invalid");
            $("#email_con").removeClass("is-valid");
        }
    })

    var pw_counter = 0;
    $( "#password" ).on('input' , function(e) 
    {
        pw_counter++;
        if(pw_counter > password_len)
        {
            if( $('#password').valid() ){
                $("#password").addClass("is-valid");
                $("#password").removeClass("is-invalid");
            }
            else{
                $("#password").addClass("is-invalid");
                $("#password").removeClass("is-valid");
            }
        }
    })

    var pwc_counter = 0;
    $( "#password_con" ).on('input' , function(e) 
    {
        pwc_counter++;
        if(pwc_counter > password_len)
        {
            if( $('#password_con').valid() ){
                $("#password_con").addClass("is-valid");
                $("#password_con").removeClass("is-invalid");
            }
            else{
                $("#password_con").addClass("is-invalid");
                $("#password_con").removeClass("is-valid");
            }
        }
    })
    // #endregion

});