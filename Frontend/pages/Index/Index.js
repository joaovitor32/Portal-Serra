let form = document.getElementById('form-login');

let nome = form.elements[0];
let senha = form.elements[1];

const errModal = (err) => {
    let modalContent = document.getElementById('modal-content')
    modal.style.display = "block";
    modalContent.innerHTML = err;
}

const checkValidityForm = () => {

    let validityNome,validitySenha;

    if (nome.value.length < 10) {      
        errModal("O nome está inválido");
        nome.classList.add('input-error');
        validityNome= false;
    } else {
        nome.classList.remove('input-error')
        validityNome=true
    }
    if (senha.value.length < 5) {
        errModal('A senha está invalida');
        senha.classList.add('input-error');
        validitySenha=false;
    } else {
        senha.classList.remove('input-error')
        validitySenha=true
    }

    return validityNome&&validitySenha;
}

const submitLogin = async e => {
    e.preventDefault();
    if (checkValidityForm()) {
        try {
            const response = await fetch('http://localhost:8080/api/routes/users/grantAcess.php', {
                method: "POST",
                body: JSON.stringify({
                    "full_name": nome.value,
                    "senha": senha.value
                }),
                header: {
                    'Content-Type': "application/json",
                },
            })

            const token = await response.json()

            if (!token) {
                throw new Error('Usuário não encontrado');
            }

            localStorage.setItem("token", token.token)
            window.location.replace("http://localhost:8080/Frontend/pages/Form/Form.php");
        } catch (err) {
            errModal(err);
            form.reset()
            return;
        }
    }
}
