const boxContentSpinner = document.getElementById('box-loading-spinner')
const boxContent = document.getElementById('box-content')

function shutdown() {
    setTimeout(()=>{
        localStorage.removeItem('token');
        window.location.replace("http://localhost:8080/Frontend/pages/Index/Index.php");
    }, 1000*60*10);
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
window.addEventListener("beforeunload",()=> {
    boxContent.style.display = "none"
    boxContentSpinner.innerHTML = loadingSpinner;
});
document.addEventListener('DOMContentLoaded',()=> {
    checkValidity(token);
 })
