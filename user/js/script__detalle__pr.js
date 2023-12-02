const inputQuantity = document.querySelector(".input__quantity");
const bntIncrement = document.querySelector("#increment");
const btnDecrement = document.querySelector("#decrement");

let valueByDefault = parseInt(inputQuantity.value);

// Funciones click

bntIncrement.addEventListener("click", () => {
  valueByDefault += 1;
  inputQuantity.value = valueByDefault;
});

btnDecrement.addEventListener("click", () => {
  if (valueByDefault === 1) {
    return;
  }
  valueByDefault -= 1;
  inputQuantity.value = valueByDefault;
});

// Toggle

// Constantes Toggle titles
const toggleDescription = document.querySelector(".title__description");
// Constantes contenido texto
const contentDescription = document.querySelector(".text__description");

// Funciones toggle

toggleDescription.addEventListener("click", () => {
  contentDescription.classList.toggle("hidden");
});
