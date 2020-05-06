const boxContentSpinner = document.getElementById('box-loading-spinner')
const boxContent = document.getElementById('box-content')

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
        window.location.replace("http://localhost:8080/Frontend/pages/NonLoggedPage/NoLoggedPage.php");
    } else {
        boxContentSpinner.style.display = "none";
        boxContent.style.display = "inline";
        shutdown();
    }
}
document.addEventListener('DOMContentLoaded', () => {
    checkValidity(token);
})
window.addEventListener("beforeunload", () => {
    boxContent.style.display = "none"
    boxContentSpinner.innerHTML = loadingSpinner;
});
//window.onunload =() =>{removeData();}
