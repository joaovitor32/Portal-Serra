import {deactivateLoader} from '../GeneralJavascript/Effects.js'
import {checkFormValidityUser,getBody} from '../GeneralJavascript/FormFunctions.js'
import {errModal} from '../../components/UI/Modal/Modal.js'
import {openDrawer,closeDrawer} from '../../components/UI/header-sistema/header-sistema.js'

import { checkValidityPages} from '../GeneralJavascript/CheckValidity.js'

let formNewMessage=document.getElementById('new-message');

const newMessage=async (event)=>{
    event.preventDefault();
    let inputs=formNewMessage.elements;
    if(checkFormValidityUser(inputs)){
        try{
            let body=getBody(inputs);
            await fetch(url+"mensagens/create.php",{
                method:"POST",
                body,
                headers: {
                    authorization: `Bearer ${token}`,
                    'Content-Type': "application/json",
                }
            })
            formNewMessage.reset();
        }catch(err){
            errModal(err);
            formNewMessage.reset();
            return;
        }
    }
}

window.onload=()=>{
    deactivateLoader();
    checkValidityPages();
}

window.newMessage=newMessage;
window.openDrawer=openDrawer;
window.closeDrawer=closeDrawer;