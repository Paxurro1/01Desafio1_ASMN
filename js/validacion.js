function validacion()
{
    // Hay muchas formas de elegir un nodo DOM; aquí obtenemos el formulario y, a continuación, el campo de entrada
    // del correo electrónico, así como el elemento span en el que colocaremos el mensaje de error.
    const form = document.getElementById('formu');

    const email = document.getElementById('email');
    const emailError = document.querySelector('#email + span.error');

    email.addEventListener('input', function (event) {
        // Cada vez que el usuario escribe algo, verificamos si
        // los campos del formulario son válidos.

        if (email.validity.valid) {
            // En caso de que haya un mensaje de error visible, si el campo
            // es válido, eliminamos el mensaje de error.
            emailError.innerHTML = ''; // Restablece el contenido del mensaje
            emailError.className = 'error'; // Restablece el estado visual del mensaje
        } else {
            // Si todavía hay un error, muestra el error exacto
            showError();
        }
    });

    form.addEventListener('submit', function (event) {
        // si el campo de correo electrónico es válido, dejamos que el formulario se envíe

        if (!email.validity.valid) {
            // Si no es así, mostramos un mensaje de error apropiado
            showError();
            // Luego evitamos que se envíe el formulario cancelando el evento
            event.preventDefault();
        }
    });

    function showError() {
        if (email.validity.valid) {
            // Si el campo está vacío
            // muestra el mensaje de error siguiente.
            emailError.textContent = 'El correo electrónico no es correcto.';
        }

        // Establece el estilo apropiado
        emailError.className = 'error active';
    }
}