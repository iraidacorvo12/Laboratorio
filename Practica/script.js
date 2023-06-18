function validarFormulario() {

    var nombre = document.getElementById('nombre').value;
    var apellido1 = document.getElementById('apellido1').value;
    var apellido2 = document.getElementById('apellido2').value;
    var email = document.getElementById('email').value;
    var login = document.getElementById('login').value;
    var password = document.getElementById('password').value;


    // Validar los campos

    var regexTexto = /^[A-Za-zÁ-ÿ\s]+$/;
    var regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (nombre.trim() === '' || apellido1.trim() === '' || apellido2.trim() === '' || email.trim() === '' || login.trim() === '' || password.trim() === '') {
        alert('Todos los campos son obligatorios.');
        return false;
    }

    if (!regex.test(nombre)) {
      alert("El nombre solo debe contener letras.");
      return false;
    }else if (!regex.test(apellido1)) {
      alert("El primer apellido solo debe contener letras.");
      return false;
    }else if (!regex.test(apellido2)) {
      alert("El segundo apellido solo debe contener letras.");
      return false;
    }else if (!regex.test(email)) {
      alert("Por favor, introduce un correo electrónico válido.");
      return false;
    }

    if (password.length < 4 || password.length > 8) {
      alert('La contraseña debe tener entre 4 y 8 caracteres.');
      return false;
    }

    return true;
  }
