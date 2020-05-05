const endSession=()=>{
    localStorage.removeItem('token');
    window.location.replace("http://localhost:8080/Frontend/pages/Index/Index.php");
}

const openDrawer=()=>{
    document.getElementById("mySidenav").style.width = "250px";
}
const closeDrawer=()=>{
    document.getElementById("mySidenav").style.width = "0";
}