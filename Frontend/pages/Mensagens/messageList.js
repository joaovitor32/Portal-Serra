let boxMessages = document.getElementById('box-messages-item');

const deleteMessage=async codMessage=>{
    try{
        const response=await fetch(url+"mensagens/delete.php",{
            method:"DELETE",
            body:JSON.stringify(
                {"idMensagem":codMessage}
            ),
            headers:{
                authorization:`Bearer ${token}`
            }
        });
        if(!response.ok){
            errModal("Não foi possível deletar a mensagem");
        }
        fetchMessages()
    }catch(err){
        errModal(err);
        return;
    }
}

const putMessages = (messages) => {
    let htmlMessages = "";
    if (messages.length == 0) {
        htmlMessages = "<div id='emptyArray'><p>Nenhuma mensagem encontrada</p></div>"
    } else {
        messages.forEach(message => {
            let data=new Date(message.data);
            htmlMessages += "<div class='card'>";
            htmlMessages += '<div class="card-inner">';
            htmlMessages += '<div class="content">';
            htmlMessages += `<p>Mensagem: ${message.mensagem}</p>`;
            htmlMessages += `<p>Anexo: ${message.texto}</p>`;
            htmlMessages += `<p>Data: ${(data.getDate() + 1) + "/" + (data.getMonth() + 1) + "/" + data.getFullYear()}</p>`;
            htmlMessages += `<img id="logo-can" onclick="deleteMessage(${message.idMensagem})" src="../../components/icons/can.svg" />`;
            htmlMessages += '</div></div></div>';
        })
    }
    boxMessages.innerHTML = htmlMessages;
}

const fetchMessages = async () => {
    activateLoader();
    try {
        const response = await fetch(url + 'mensagens/index.php', {
            method: "GET",
            body: null,
            headers: {
                authorization: `Bearer ${token}`,
            }
        })
        const messages = await response.json();
        putMessages(messages)
        deactivateLoader();
        cardEffects();
    } catch (err) {
        errModal(err);
        return;
    }
}

window.onload = () => {
    fetchMessages();
}