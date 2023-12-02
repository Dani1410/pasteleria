const botones = document.querySelectorAll(".botones");

botones.forEach((boton) => {
  boton.addEventListener("click", (e) => {
    botones.forEach((btn) => {
      btn.classList.remove("active");
    });
    e.currentTarget.classList.add("active");

    const opcionElegida = e.currentTarget.id;

    const seccionGeneral = document.getElementById("info-general");
    const seccionDirecciones = document.getElementById("info-direcciones");

    seccionDirecciones.classList.remove("active");
    seccionGeneral.classList.remove("active");

    if (opcionElegida === "btn-general") {
      seccionGeneral.classList.add("active");
    } else if (opcionElegida === "btn-direcciones") {
      seccionDirecciones.classList.add("active");
    }
  });
});

function backHome() {
    location.href ='../index.html';
}
