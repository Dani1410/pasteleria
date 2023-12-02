// VALIDAR

function validarCodigoPostal() {
  var codigoPostal = document.getElementById("cp").value;
  var mensajeError = document.getElementById("mensaje-error");
  var mensajeEnvio = document.getElementById("mensaje-envio");
  var btnFinalizarCompra = document.getElementById("btn__finalizar");

  // Aquí deberías realizar una validación real con una base de datos o servicio
  // Si el código postal no es elegible, muestra el mensaje de error
  // Por ejemplo:
  if (codigoPostal.length == 5) {
    if (codigoPostal === "12345") {
      mensajeEnvio.style.display = "block";
      mensajeError.style.display = "none"; // Código postal válido
      btnFinalizarCompra.style.display = "block";
    } else {
      mensajeError.textContent =
        "Lo sentimos, no realizamos envíos a este código postal.";
      mensajeError.style.display = "block"; // Código postal no válido
    }
  } else {
    mensajeError.textContent = "Código postal inválido. Debe tener 5 dígitos.";
    mensajeError.style.display = "block";
  }
}

function mostrarCodigoPostal() {
  var envioSelect = document.getElementById("tipo__envio");
  var codigoPostalDiv = document.getElementById("codigo-postal");
  var btnVerificarCP = document.querySelector(".codigo__postal button");
  var btnFinalizarCompra = document.getElementById("btn__finalizar");
  var mensajeEnvio = document.getElementById("mensaje-envio");

  if (envioSelect.value === "envio") {
    codigoPostalDiv.style.display = "block";
    btnFinalizarCompra.style.display = "none";
    mensajeEnvio.style.display = "none"; // Oculta el mensaje de envío válido
  } else {
    codigoPostalDiv.style.display = "none";
    btnFinalizarCompra.style.display = "block";
    mensajeEnvio.style.display = "none"; // Oculta el mensaje de envío válido
  }
}

function checkEmptyCart() {
  var emptyCartMessage = document.getElementById("empty-cart-message");
  var detallesProductos = document.querySelector(".detalles__productos");
  var general = document.querySelector(".general__cart");

  // Obtén la cantidad de productos en el carrito (ajusta esto según tu implementación)
  var cantidadProductosEnCarrito = 1; /* Obten la cantidad de productos aquí */

  // Verifica si el carrito está vacío
  if (cantidadProductosEnCarrito === 0) {
    emptyCartMessage.style.display = "flex"; // Muestra el mensaje
    general.style.display = "none"; // Oculta la sección de productos (ajusta según tu estructura)
  } else {
    emptyCartMessage.style.display = "none"; // Oculta el mensaje
    general.style.display = "flex"; // Muestra la sección de productos (ajusta según tu estructura)
  }
}

window.addEventListener("load", checkEmptyCart);

function backHome() {
  location.href = "../index.php";
}
