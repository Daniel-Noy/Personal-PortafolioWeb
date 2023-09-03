import { animateUpIn, animateUpOut, animateFadeIn, animateFadeOut } from "./animations.js";

export function expandCards() {
    const cardsContainer = document.querySelector('.projects__grid');
    const cards = cardsContainer.querySelectorAll('.card');

    cards.forEach(card => {
        card.addEventListener('click', expandCard);
    })
}

function expandCard({currentTarget, target}) {
    const previousModal = document.querySelector('.card__modal');

    if( previousModal ) {
        const previousCard = document.querySelector('.card--selected');
        animateUpOut(previousCard, 450);
        animateFadeOut(previousModal, 550);
    }
    else {
        const copyCard = currentTarget.cloneNode(true);
        copyCard.classList.add('card--selected');
        
        const modal = document.createElement('DIV');
        modal.classList.add('card__modal');
        modal.onclick = expandCard;

        modal.appendChild(copyCard);
        document.body.appendChild(modal);

        animateFadeIn(modal, 500);
        animateUpIn(copyCard, 500);
    }
}