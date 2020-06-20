$('document').ready(function(){

    // #region validation rules
    $('#support_form').validate({
        rules: {
            title: {
                required: true,
                minlength: 5
            },
            description: {
                required: true,
                minlength: 100
            },
            formCheck: {
                required: true
            },
        }
    });
    // #endregion

});
