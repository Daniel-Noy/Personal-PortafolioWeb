export default class Animate {
    upIn(node, time, options = this.options) {
        node.classList.add('animate-up-in');
    
        setTimeout(()=> {
            node.classList.remove('animate-up-in');
        }, time)
    }
    
    upOut(node, time) {
        node.classList.add('animate-up-out');
    
        setTimeout(()=> {
            node.remove()
        }, time)
    }
    
    fadeIn(node, time) {
        node.classList.add('animate-fade-in');
    
        setTimeout(()=> {
            node.classList.remove('animate-fade-in');
        }, time)
    }
    fadeOut(node, time) {
        node.classList.add('animate-fade-out');
    
        setTimeout(()=> {
            node.remove();
        }, time)
    }
}