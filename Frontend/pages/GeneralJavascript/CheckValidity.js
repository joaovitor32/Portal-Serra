
const removeData = () => {
    localStorage.removeItem('token');
    window.location.replace("http://localhost:8080/Frontend/pages/Index/Index.php");
}

const shutdown = () => {
    setTimeout(() => {
        removeData();
    }, 1000 * 60 * 10);
}

const checkValidity = (tok) => {
    if (!tok) {
        activateLoader();
        window.location.replace("http://localhost:8080/Frontend/pages/NonLoggedPage/NoLoggedPage.php");
    } else {
        shutdown();
    }
}
document.addEventListener('DOMContentLoaded', () => {
    checkValidity(token);
})

//window.onunload =() =>{removeData();}
