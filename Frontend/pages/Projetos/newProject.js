import {deactivateLoader} from '../GeneralJavascript/Effects.js'
import {checkFormValidityUser,getBody} from '../GeneralJavascript/FormFunctions.js'
import {errModal} from '../../components/UI/Modal/Modal.js'
import {openDrawer,closeDrawer} from '../../components/UI/header-sistema/header-sistema.js'

import { checkValidityPages} from '../GeneralJavascript/CheckValidity.js'

let formNewProject=document.getElementById('new-project');

const newProject=async (event)=>{
    event.preventDefault();
    let inputs=formNewProject.elements;
    if(checkFormValidityUser(inputs)){
        try{
            let body=getBody(inputs);
            await fetch(url+"projetos/create.php",{
                method:"POST",
                body,
                headers: {
                    authorization: `Bearer ${token}`,
                    'Content-Type': "application/json",
                }
            })
            formNewProject.reset();
        }catch(err){
            errModal(err);
            formNewProject.reset();
            return;
        }
    }
}

window.onload=()=>{
    deactivateLoader();
    checkValidityPages();
}

window.newProject=newProject;
window.openDrawer=openDrawer;
window.closeDrawer=closeDrawer;