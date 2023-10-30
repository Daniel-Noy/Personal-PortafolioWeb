import { formImage } from "./modules/formImage.js";
import { expandCards } from "./modules/expandCards.js";

const cards = document.querySelector('.projects__grid');
const form = document.querySelector('.form');

document.addEventListener('DOMContentLoaded', ()=> {
    if(cards) {
        expandCards();
    }

    form.addEventListener('submit', enviarCorreo)
})

function enviarCorreo(e) {
    const submitBtn = document.querySelector('.form__submit');
    submitBtn.disabled = true
    submitBtn.textContent = 'Enviando Correo'

    const loader = document.createElement('span');
    loader.className = 'loader';
    submitBtn.appendChild(loader)
}