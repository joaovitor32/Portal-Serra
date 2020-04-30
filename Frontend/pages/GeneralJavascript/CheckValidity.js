const boxContentSpinner = document.getElementById('box-loading-spinner')
const boxContent = document.getElementById('box-content')

function shutdown() {
    setInterval(()=>{
        localStorage.removeItem('token');
        window.location.replace("http://localhost:8080/Frontend/pages/Index/Index.php");
    }, 1000*60*60);
}

const checkValidity = (token) => {
    if (!token) {
        window.location.replace("http://localhost:8080/Frontend/pages/NonLoggedPage/NoLoggedPage.php");
    } else {
        boxContent.style.display = "inline"
        boxContentSpinner.style.display = "none";
        shutdown();
    }
}
window.onload = () => {
    const token = localStorage.getItem('token')
    checkValidity(token);
}
window.onbeforeunload = () => {
    boxContent.style.display = "none"
    boxContentSpinner.innerHTML = loadingSpinner;
}