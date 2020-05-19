import {deactivateLoader,activateLoader} from '../GeneralJavascript/Effects.js'
import {openDrawer,closeDrawer} from '../../components/UI/header-sistema/header-sistema.js'
import { checkValidityPages} from '../GeneralJavascript/CheckValidity.js'

window.addEventListener("beforeunload", () => {
    activateLoader();
});
document.addEventListener("DOMContentLoaded", () => {
    deactivateLoader();
});

window.openDrawer=openDrawer;
window.closeDrawer=closeDrawer;

window.onload=()=>{
    checkValidityPages();
}