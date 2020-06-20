$('document').ready(function(){

    // #region validation rules
    $('#registration_form').validate({
        rules: {
            rulecheck: {
                required: true,
            },
            formCheck: {
                required: true
            },
        }
    });
    // #endregion
});
