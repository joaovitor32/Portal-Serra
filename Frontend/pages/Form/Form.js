
const checkValidity=(token)=>{
    if(!token){
        window.location.replace("http://localhost:8080/Frontend/pages/Index/Index.php");
    }
}

window.onload=()=>{
    const token=localStorage.getItem('token')
    checkValidity(token);
}