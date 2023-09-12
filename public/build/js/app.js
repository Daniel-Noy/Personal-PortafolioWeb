import { formImage } from "./modules/formImage.js";
import { expandCards } from "./modules/expandCards.js";

const cards = document.querySelector('.projects__grid');
const form = document.querySelector('.form');

document.addEventListener('DOMContentLoaded', ()=> {
    if(cards) {
        expandCards();
    }
})




