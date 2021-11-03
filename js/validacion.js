function validacionEmail(email, emailError) {
    email.addEventListener('blur', function (event) {
        if (email.validity.valid) {
            emailError.innerHTML = '';
            emailError.classList.remove('active');
        } else {
            emailError.classList.add('active');
            showError();
        }
    });
    function showError() {
        if (email.validity.valueMissing) {
            emailError.textContent = 'Debe introducir una dirección de correo electrónico.';
        } else if (email.validity.typeMismatch) {
            emailError.textContent = 'El valor introducido debe ser una dirección de correo electrónico.';
        } else if (email.validity.tooShort) {
            emailError.textContent = 'El correo electrónico debe tener al menos 5 caracteres.';
        }
    }
}
function validacionPass(pass, passError){
    pass.addEventListener('blur', function (event) {

        if (pass.validity.valid) {
            passError.innerHTML = '';
            passlError.classList.remove('active');
        } else {
            passError.classList.add('active');
            showError();
        }
    });
    function showError() {
        if (pass.validity.valueMissing) {
            passError.textContent = 'Debe introducir una contraseña.';
        } else if (pass.validity.tooShort) {
            passError.textContent = 'La contraseña debe tener al menos 5 caracteres.';
        }
    }
}
function validacionUsuario(usuario, usuarioError){
    usuario.addEventListener('blur', function (event) {

        if (usuario.validity.valid) {
            usuarioError.innerHTML = '';
            usuariolError.classList.remove('active');
        } else {
            usuarioError.classList.add('active');
            showError();
        }
    });
    function showError() {
        if (usuario.validity.valueMissing) {
            usuarioError.textContent = 'Debe introducir un usuario correcto.';
        } else if (usuario.validity.tooShort) {
            usuarioError.textContent = 'El usuario debe tener al menos 3 carácteres.';
        }
    }
}
function validacionIndex() {
    const form = document.getElementById('formulario_loging');

    const email = document.getElementById('email');
    const emailError = document.querySelector('#email + span.error');
    validacionEmail(email, emailError);

    const pass = document.getElementById('pass');
    const passError = document.querySelector('#pass + span.error');
    validacionPass(pass, passError);

    form.addEventListener('submit', function (event) {

        if (!email.validity.valid) {
            event.preventDefault();
        }
        if (!pass.validity.valid) {
            event.preventDefault();
        }
    });
}
function passIguales(pass1, pass2, error){
    pass2.addEventListener('blur', function (event) {
        if (pass1.value === pass2.value) {
            error.innerHTML = '';
            error.classList.remove('active');
        } else {
            error.classList.add('active');
            showError();
        }
    });
    function showError() {
        error.textContent = 'Las contraseñas no coinciden';
    }
}
function validacionRegistro() {
    const form = document.getElementById('formulario_registro');
    var pass1 = document.getElementById('pass');
    var pass2 = document.getElementById('pass2');

    const email = document.getElementById('email');
    const emailError = document.querySelector('#email + span.error');
    validacionEmail(email, emailError);

    const pass = document.getElementById('pass');
    const passError = document.querySelector('#pass + span.error');
    validacionPass(pass, passError);

    const pass2Error = document.querySelector('#pass2 + span.error');
    passIguales(pass1, pass2, pass2Error)

    const usuario = document.getElementById('usuario');
    const usuarioError = document.querySelector('#usuario + span.error');
    validacionUsuario(usuario, usuarioError);
    
    form.addEventListener('submit', function (event) {
        if (!email.validity.valid) {
            event.preventDefault();
        }
        if (!pass.validity.valid) {
            event.preventDefault();
        }
        if (!usuario.validity.valid){
            event.preventDefault();
        }
        if(pass1.value != pass2.value){
            event.preventDefault();
        }
    });
}
function validacionEnigma(pregunta, preguntaError){
    pregunta.addEventListener('blur', function (event) {

        if (pregunta.validity.valid) {
            preguntaError.innerHTML = '';
            preguntaError.classList.remove('active');
        } else {
            preguntaError.classList.add('active');
            showError();
        }
    });
    function showError() {
        if (pregunta.validity.valueMissing) {
            preguntaError.textContent = 'Debe introducir una pregunta.';
        } else if (pregunta.validity.tooShort) {
            preguntaError.textContent = 'La pregunta debe tener al menos 2 carácteres.';
        }
    }
}
function validacionRespuesta(respuesta, respuestaError){
    respuesta.addEventListener('blur', function (event) {

        if (respuesta.validity.valid) {
            respuestaError.innerHTML = '';
            respuestaError.classList.remove('active');
        } else {
            respuestaError.classList.add('active');
            showError();
        }
    });
    function showError() {
        if (respuesta.validity.valueMissing) {
            respuestaError.textContent = 'Respuesta vacía.';
        }
    }
}
function validacionPregunta() {
    const form = document.getElementById('formulario_pregunta');

    const pregunta = document.getElementById('pregunta');
    const preguntaError = document.querySelector('#pregunta + span.error');
    validacionEnigma(pregunta, preguntaError);

    const respuesta1 = document.getElementById('respuesta1');
    const respuesta1Error = document.querySelector('#respuesta1 + span.error');
    validacionRespuesta(respuesta1, respuesta1Error);

    const respuesta2 = document.getElementById('respuesta2');
    const respuesta2Error = document.querySelector('#respuesta2 + span.error');
    validacionRespuesta(respuesta2, respuesta2Error);

    const respuesta3 = document.getElementById('respuesta3');
    const respuesta3Error = document.querySelector('#respuesta3 + span.error');
    validacionRespuesta(respuesta3, respuesta3Error);

    const respuesta4 = document.getElementById('respuesta4');
    const respuesta4Error = document.querySelector('#respuesta4 + span.error');
    validacionRespuesta(respuesta4, respuesta4Error);

    form.addEventListener('submit', function (event) {
        if (!pregunta.validity.valid) {
            event.preventDefault();
        }
        if (!respuesta1.validity.valid) {
            event.preventDefault();
        }
        if (!respuesta2.validity.valid){
            event.preventDefault();
        }
        if (!respuesta3.validity.valid){
            event.preventDefault();
        }
        if (!respuesta4.validity.valid){
            event.preventDefault();
        }
    });
}