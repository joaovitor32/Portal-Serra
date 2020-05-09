let loadingSpinner='<div class="lds-ring"><div></div><div></div><div></div><div></div></div>'
const boxContentSpinner=document.getElementById('box-loading-spinner');
let boxContent=document.getElementById('box-content');
const token = localStorage.getItem('token')
const url="/api/routes/"

const activateLoader=()=>{
    boxContent.style.display = "none"
    boxContentSpinner.innerHTML = loadingSpinner;
}
const deactivateLoader=()=>{
    boxContentSpinner.style.display = "none";
    boxContent.style.display = "inline";
}