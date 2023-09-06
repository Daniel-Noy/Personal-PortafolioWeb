import { formImage } from "./formImage.js";
import { expandCards } from "./modules/expandCards.js";

const cards = document.querySelector('.projects__grid');
const form = document.querySelector('.form');
if(cards) {
    expandCards();
}

// if(form) {
//     formImage();
// }


