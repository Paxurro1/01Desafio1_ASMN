grecaptcha.ready(function () {
    grecaptcha.execute('6LebEPEcAAAAANcqC4TpmZCeMAww49Vo13jntCJp', { action: 'formulario_registro' })
        .then(function (token) {
            var recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
});