import {removeData} from '../../../pages/GeneralJavascript/CheckValidity.js'

const endSession=()=>{
    removeData()
}

export const openDrawer=()=>{
    document.getElementById("mySidenav").style.width = "250px";
}
export const closeDrawer=()=>{
    document.getElementById("mySidenav").style.width = "0";
}

window.endSession=endSession;