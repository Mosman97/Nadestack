$('document').ready(function () {

    var password_len = 7;
    var teamname_min = 3;
    var teamname_max = 20;
    var teamtag_min = 3;
    var teamtag_max = 7;
    var orga_len = 5;

    // #region validation rules
    $('#profile_settings_form').validate({
        rules: {
            teamname: {
                required: true,
                maxlength: teamname_max,
                minlength: teamname_min},
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

    // #region focusout elements for validation
    $("#teamname").on('input', function (e)
    {
            if ($('#teamname').valid())
            {
                $("#teamname").removeClass("is-invalid");
            } else {
                $("#teamname").addClass("is-invalid");
            }
    })

    $("#teamtag").on('input', function (e)
    {
            if ($('#teamtag').valid())
            {
                $("#teamtag").removeClass("is-invalid");
            } else {
                $("#teamtag").addClass("is-invalid");
            }
    })

    $("#orga").on('input', function (e)
    {
            if ($('#orga').valid())
            {
                $("#orga").removeClass("is-invalid");
            } else {
                $("#orga").addClass("is-invalid");
        }
    })

    $("#password").on('input', function (e)
    {
            if ($('#password').valid()) {
                $("#upassword").removeClass("is-invalid");
            } else {
                $("#password").addClass("is-invalid");
            }
    })

    $("#password_con").on('input', function (e)
    {
            if ($('#password_con').valid()) {
                $("#password_con").removeClass("is-invalid");
            } else {
                $("#password_con").addClass("is-invalid");
            }
    })
    // #endregion

});
