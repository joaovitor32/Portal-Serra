/*"use strict";

const newHeaders = new Headers();
newHeaders.append("Access-Control-Allow-Origin", "http:*")
newHeaders.append("Access-Control-Allow-Methods", "GET")
newHeaders.append("Access-Control-Allow-Headers", "OPTIONS,GET");
newHeaders.append("Content-Type", "text/html");

const corsGetFile = {
    method: "GET",
    headers:newHeaders,
    mode: 'no-cors',
    chache: "default",
}


const loadFooter =  () => {
    const request = new Request(`${config.localhost}/footer/footer.html`, corsGetFile);
    fetch(`${config.localhost}/footer/footer.html`, corsGetFile)
        .then(response => {
            console.log(response)
            console.log(response.text())
            return response.text();
        })
        .then(data => {
            let footer = document.getElementById('footer');
            footer.innerHTML = data;
        })
}

const loadComponents = () => {
    loadFooter();

}

document.onload=loadComponents();*/