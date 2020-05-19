export const cardEffects = () => {
    let cards = document.getElementsByClassName('card');
    let delay=0.2;
    Object.values(cards).forEach(card=>{
        card.style.animationDelay=delay+"s"
        delay+=0.2;
    })
}

export const activateLoader=()=>{
    boxContent.style.display = "none"
    boxContentSpinner.innerHTML = loadingSpinner;
}
export const deactivateLoader=()=>{
    boxContentSpinner.style.display = "none";
    boxContent.style.display = "inline";
}