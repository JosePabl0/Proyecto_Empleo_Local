// ============================================================
// IMPULSA - inicio.js
// Comportamiento de la página principal:
// navbar que cambia de estilo al hacer scroll
// ============================================================

"use strict";

document.addEventListener("DOMContentLoaded", function () {
    const barra = document.getElementById("barra-top");
    if (!barra) return;

    window.addEventListener("scroll", function () {
        if (window.scrollY > 60) {
            barra.classList.add("barra-solida");
        } else {
            barra.classList.remove("barra-solida");
        }
    });
});