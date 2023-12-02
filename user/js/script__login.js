let status_sesion = 'activo';

document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("login-form");
  const registerForm = document.getElementById("register-form");
  const loginLink = document.getElementById("login-link");
  const registerLink = document.getElementById("register-link");
  const showLoginPasswordButton = document.getElementById(
    "show-login-password"
  );
  const showRegisterPasswordButton = document.getElementById(
    "show-register-password"
  );
  const loginPasswordInput = document.getElementById("login-password");
  const registerPasswordInput = document.getElementById("register-password");

  loginLink.addEventListener("click", function (e) {
    e.preventDefault();
    loginForm.style.display = "block";
    registerForm.style.display = "none";
  });

  registerLink.addEventListener("click", function (e) {
    e.preventDefault();
    loginForm.style.display = "none";
    registerForm.style.display = "block";
  });

  showLoginPasswordButton.addEventListener("click", function () {
    togglePasswordVisibility(loginPasswordInput, showLoginPasswordButton);
  });

  showRegisterPasswordButton.addEventListener("click", function () {
    togglePasswordVisibility(registerPasswordInput, showRegisterPasswordButton);
  });

  loginForm.addEventListener("submit", function (e) {
    e.preventDefault();
    // ... (verificación de credenciales)
  });

  registerForm.addEventListener("submit", function (e) {
    e.preventDefault();
    // ... (registro de usuario)
  });

  function togglePasswordVisibility(passwordInput, iconElement) {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      iconElement.classList.remove("fa-eye");
      iconElement.classList.add("fa-eye-slash");
    } else {
      passwordInput.type = "password";
      iconElement.classList.remove("fa-eye-slash");
      iconElement.classList.add("fa-eye");
    }
  }

  loginForm.addEventListener("submit", function (e) {
    e.preventDefault();

    // Obtener el valor del campo de usuario y contraseña
    const username = document.getElementById("login-username").value;
    const password = document.getElementById("login-password").value;

    // Verificar las credenciales
    if (username === "usuario" && password === "usuario") {
      // Credenciales válidas, redirigir al usuario a la página deseada
      window.location.href = "../index.html";
      return status_sesion = 'activo';
    } else {
      // Credenciales incorrectas, mostrar un mensaje de error
      alert("Credenciales incorrectas. Por favor, inténtalo de nuevo.");
      return status_sesion = 'inactivo';
    }
  });
});
