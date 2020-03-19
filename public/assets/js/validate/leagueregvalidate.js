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

    // #region functions
    $('#submit_btn').on('click',function(evt)
    {
        //PHP Aufruf
    });
    // #endregion
});
