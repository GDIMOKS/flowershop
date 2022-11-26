let menu = document.getElementById("menu");

function showMenu() {
    menu.classList.toggle("show");
}

window.onclick = function (e) {
    if (!e.target.closest('.cabinet_button')) {
        if (menu.classList.contains('show')) {
            showMenu();
        }
    }
}
