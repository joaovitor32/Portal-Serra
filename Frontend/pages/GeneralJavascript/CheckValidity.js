export const removeData = () => {
    localStorage.removeItem('token');
    localStorage.removeItem('time');
    window.location.replace("http://localhost:8080/Frontend/pages/Index/Index.php");
}

const setTime = () => {
    let time = 0;
    setInterval(() => {
        time = +localStorage.getItem('time')
        time += 1000;
        localStorage.setItem('time', time)
    }, 1000);
}
const shutdown = () => {
    let timeLeft = localStorage.getItem('time');
    setTimeout(() => {
        removeData();
    }, (1000*60*60) - timeLeft);
}
const checkValidity = () => {
    if (!token) {
        activateLoader();
        window.location.replace("http://localhost:8080/Frontend/pages/NonLoggedPage/NoLoggedPage.php");
    } else {
        setTime();
        shutdown();
    }
}

export const checkValidityPages = () => {
    checkValidity();
}


