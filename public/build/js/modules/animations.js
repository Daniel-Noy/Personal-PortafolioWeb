export function animateUpIn(node, time) {
    node.classList.add('animate-up-in');

    setTimeout(()=> {
        node.classList.remove('animate-up-in');
    }, time)
}

export function animateUpOut(node, time) {
    node.classList.add('animate-up-out');

    setTimeout(()=> {
        node.remove()
    }, time)
}

export function animateFadeIn(node, time) {
    node.classList.add('animate-fade-in');

    setTimeout(()=> {
        node.classList.remove('animate-fade-in');
    }, time)
}
export function animateFadeOut(node, time) {
    node.classList.add('animate-fade-out');

    setTimeout(()=> {
        node.remove();
    }, time)
}