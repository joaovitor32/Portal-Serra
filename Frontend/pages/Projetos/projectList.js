import {openDrawer,closeDrawer} from '../../components/UI/header-sistema/header-sistema.js'
import {activateLoader,deactivateLoader,cardEffects} from '../GeneralJavascript/Effects.js'
import {errModal} from '../../components/UI/Modal/Modal.js'

import { checkValidityPages} from '../GeneralJavascript/CheckValidity.js'

let boxProjects = document.getElementById('box-projects-item');

const deleteProject=async codProject=>{
    try{
        const response=await fetch(url+"projetos/delete.php",{
            method:"DELETE",
            body:JSON.stringify(
                {"idProjeto":codProject}
            ),
            headers:{
                authorization:`Bearer ${token}`
            }
        });
        if(!response.ok){
            errModal("Não foi possível deletar o projeto");
        }
        fetchProjects()
    }catch(err){
        errModal(err);
        return;
    }
}

const putProjects = (Projects) => {
    let htmlProjects = "";
    if (projects.length == 0) {
        htmlProjects = "<div id='emptyArray'><p>Nenhum projeto encontrado</p></div>"
    } else {
        projects.forEach(Project => {
            htmlProjects += "<div class='card'>";
            htmlProjects += '<div class="card-inner">';
            htmlProjects += '<div class="content">';
            htmlProjects += `<p>Título: ${project.titulo}</p>`;
            htmlProjects += `<p>Descrição: ${project.descricao}</p>`;
            htmlProjects += `<p>Foto: ${project.foto}</p>`;
            htmlProjects += `<img id="logo-can" onclick="deleteProject(${project.idProjeto})" src="../../components/icons/can.svg" />`;
            htmlProjects += '</div></div></div>';
        })
    }
    boxProjects.innerHTML = htmlProjects;
}

const fetchProjects = async () => {
    activateLoader();
    try {
        const response = await fetch(url + 'projetos/index.php', {
            method: "GET",
            body: null,
            headers: {
                authorization: `Bearer ${token}`,
            }
        })
        const Projects = await response.json();
        putProjects(projects)
        deactivateLoader();
        cardEffects();
    } catch (err) {
        errModal(err);
        return;
    }
}

window.onload = () => {
    fetchProjects();
    checkValidityPages();
}

window.openDrawer=openDrawer;
window.closeDrawer=closeDrawer;
window.deleteProject=deleteProject;