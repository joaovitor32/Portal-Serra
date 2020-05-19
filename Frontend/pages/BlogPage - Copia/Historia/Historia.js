const fadeInInfoContents = () => {
    let infoContents = document.getElementsByClassName("content-info");
    Array.prototype.forEach.call(infoContents, (infoContent) => {
        opacity = 0;
        let interval=setInterval(() => {
            if(opacity<1){
                infoContent.style.opacity = opacity;
                opacity += 0.1;
            }else{
                clearInterval(interval);
            }
        }, 80)
    })
}

document.addEventListener("DOMContentLoaded", () => {
    fadeInInfoContents();
})