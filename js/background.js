const fondos = [
    "fondo1.jpg",
    "fondo2.jpg",
    "fondo3.jpg"
];

let indice = 0;

function cambiarFondo() {
    document.body.style.backgroundImage = `url('${fondos[indice]}')`;
    indice = (indice + 1) % fondos.length;
}

// Cambia cada 7 segundos
setInterval(cambiarFondo, 7000);

// Inicial
cambiarFondo();
