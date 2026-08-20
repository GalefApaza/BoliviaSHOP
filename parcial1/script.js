const boton = document.querySelector("#envio");
const mensaje = document.querySelector("#mensaje");

boton.addEventListener("click", function() {
    mensaje.textContent = "PEDIDO EN PROCESO";
    mensaje.classList.remove("probar");
});