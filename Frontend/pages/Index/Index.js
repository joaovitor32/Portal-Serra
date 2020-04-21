const errModal=(err)=>{
    let modalContent=document.getElementById('modal-content')
    modal.style.display = "block";
    modalContent.innerHTML=err;
}

const submitLogin = async () => {
    let form = document.getElementById('form-login');

    let nome = form.elements[0].value;
    let senha = form.elements[1].value;

    if (nome.length < 10 || senha.length < 5) {
        errModal("O nome  ou a senha estão inválidos");
        return;
    }

    try {
        const response = await fetch('http://localhost:8080/api/routes/users/grantAcess.php', {
            method: "POST",
            body: JSON.stringify({
                "full_name": nome,
                "senha": senha
            }),
            header: {
                'Content-Type': "application/json",
            },
        })
    
        const token=await response.json()

        localStorage.setItem("token",token.token)
        window.location.replace("http://localhost:8080/Frontend/pages/Form/Form.php");
    }catch(err){
        errModal(err);
        return;
    }
}