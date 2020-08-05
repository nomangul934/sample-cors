/**
 * Created by mac on 04/09/19.
 */
(function () {

    // $('.form-prevent-multiple-submits').on('submit', function () {
    //     $('.button-prevent-multiple-submits').attr('disabled', 'true');
    // });

    // $(".form-prevent-multiple-submits").validate({
    //     submitHandler: function (form) {
    //         alert('7890');
    //         var response = grecaptcha.getResponse();
    //         //recaptcha failed validation
    //         if (response.length == 0) {
    //             $('#recaptcha-error').show();
    //             return false;
    //         }
    //         //recaptcha passed validation
    //         else {
    //             $('#recaptcha-error').hide();
    //             return true;
    //         }
    //     }
    // });

    $(".recapcha-form").on("submit", function(event) {
        event.preventDefault();
        var response = grecaptcha.getResponse();
        //recaptcha failed validation
        if (response.length == 0) {
            $('.recaptch-error-message').css('display', 'block');
            return false;
        }
        this.submit();
    });

})();
