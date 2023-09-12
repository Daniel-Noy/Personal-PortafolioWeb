import Animate from "./animations.js";

const animate = new Animate;

export function expandCards() {
    const cardsContainer = document.querySelector('.projects__grid');
    const cards = cardsContainer.querySelectorAll('.card');

    cards.forEach(card => {
        card.addEventListener('click', expandCard);
    })
}

function expandCard({currentTarget}) {
    const previousModal = document.querySelector('.card__modal');

    if( previousModal ) {
        const previousCard = document.querySelector('.card--selected');
        animate.upOut(previousCard, 450)
        animate.fadeOut(previousModal, 550);
    }
    else {
        const copyCard = currentTarget.cloneNode(true);
        copyCard.classList.add('card--selected');
        
        const modal = document.createElement('DIV');
        modal.classList.add('card__modal');
        modal.onclick = expandCard;

        modal.appendChild(copyCard);
        document.body.appendChild(modal);

        animate.fadeIn(modal, 500);
        animate.upIn(copyCard, 500);
    }
}