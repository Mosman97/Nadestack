$('document').ready(function(){

    var password_len = 7;
    var teamname_min = 5;
    var teamname_max= 20;
    var teamtag_min = 3;
    var teamtag_max = 7;
    var orga_len = 5;

    // #region validation rules
    $('#profile_settings_form').validate({
        rules: {
            teamname: {
                required: true,
                maxlength: teamname_max,
                minlength: teamname_min
            },
            teamtag: {
                required: true,
                maxlength: teamtag_max,
                minlength: teamtag_min
            },
            orga: {
                minlength: orga_len
            },
            password: {
                required: true,
                minlength: password_len
            },
            password_con: {
                required: true,
                equalTo: "#password"
            },
            website: {
                url: true
            },
            description: {
                maxlength: 1000
            },
            twitter: {
                url: true
            },
            instagram: {
                url: true
            },
            twitch: {
                url: true
            },
            youtube: {
                url: true
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
        var valid = $("#profile_settings_form").validate();
        if ( valid.valid() == true){
            alert("geht");
            //PHP Aufruf
        }
    });
    // #endregion

    // #region focusout elements for validation
    var tn_counter = 0;
    $( "#teamname" ).on('input' , function(e)
    {
        tn_counter++;
        if(tn_counter > teamname_min)
        {
            if( $('#teamname').valid() )
            {
                $("#teamname").addClass("is-valid");
                $("#teamname").removeClass("is-invalid");
            }
            else{
                $("#teamname").addClass("is-invalid");
                $("#teamname").removeClass("is-valid");
            }
        }
    })

    var tt_counter = 0;
    $( "#teamtag" ).on('input' , function(e)
    {
        tt_counter++;
        if(tt_counter > teamtag_min)
        {
            if( $('#teamtag').valid() )
            {
                $("#teamtag").addClass("is-valid");
                $("#teamtag").removeClass("is-invalid");
            }
            else{
                $("#teamtag").addClass("is-invalid");
                $("#teamtag").removeClass("is-valid");
            }
        }
    })

    var or_counter = 0;
    $( "#orga" ).on('input' , function(e)
    {
        or_counter++;
        if(or_counter > orga_len)
        {
            if( $('#orga').valid() )
            {
                $("#orga").addClass("is-valid");
                $("#orga").removeClass("is-invalid");
            }
            else{
                $("#orga").addClass("is-invalid");
                $("#orga").removeClass("is-valid");
            }
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
                $("#upassword").removeClass("is-invalid");
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
                $("#password_cons").removeClass("is-valid");
            }
        }
    })
    // #endregion

});
