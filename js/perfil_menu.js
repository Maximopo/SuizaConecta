const btn = document.getElementById("perfil-btn");
const menu = document.getElementById("perfil-menu");

btn.addEventListener("click", () => {
    menu.style.display = menu.style.display === "block" ? "none" : "block";
});

// cerrar el menú si se hace clic afuera
document.addEventListener("click", (e) => {
    if (!btn.contains(e.target) && !menu.contains(e.target)) {
        menu.style.display = "none";
    }
});
