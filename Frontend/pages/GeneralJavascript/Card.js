const cardEffects = () => {
    let cards = document.getElementsByClassName('card');
    let delay=0.2;
    Object.values(cards).forEach(card=>{
        card.style.animationDelay=delay+"s"
        delay+=0.2;
    })
}