const cuerpo = document.querySelector("body");
const botonModo = document.querySelector("#btn-tema");

let esDeDia = false;

function alternarModo() {
    cuerpo.classList.toggle("claro");
    esDeDia = !esDeDia;

    if (esDeDia) {
        botonModo.textContent = "🌙 Modo Noche";
    } else {
        botonModo.textContent = "☀️ Modo Día";
    }
}

botonModo.addEventListener("click", alternarModo);

const btnMenu = document.querySelector("#btn-menu");
const menuLista = document.querySelector("nav ul");

btnMenu.addEventListener("click", () => {
    menuLista.classList.toggle("abierto");
});

const formulario = document.querySelector("form");
const avisoPedido = document.querySelector("#aviso-pedido");

function revisarPedido(event) {
    event.preventDefault();

    const nombre = document.querySelector("#nombre").value;
    const correo = document.querySelector("#correo").value;

    if (nombre === "") {
        avisoPedido.textContent = "Falta tu nombre, caserito.";
        avisoPedido.classList.add("error");
        avisoPedido.classList.remove("exito");
    } else if (correo.includes("@") === false) {
        avisoPedido.textContent = "Ese correo no parece correo: le falta el @.";
        avisoPedido.classList.add("error");
        avisoPedido.classList.remove("exito");
    } else {
        avisoPedido.textContent = "Pedido recibido, caserito. Te contactamos hoy.";
        avisoPedido.classList.add("exito");
        avisoPedido.classList.remove("error");
    }
}

if (formulario) {
    formulario.addEventListener("submit", revisarPedido);
}