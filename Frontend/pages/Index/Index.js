import {errModal} from '../../components/UI/Modal/Modal.js'


let form = document.getElementById('form-login');

let nome = form.elements[0];
let senha = form.elements[1];

const checkValidityForm = () => {

    let validityNome,validitySenha;

    if (nome.value.length < 5) {      
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

export const submitLogin = async e => {
    e.preventDefault();
    if (checkValidityForm()) {
        try {
            const response = await fetch('http://localhost:8080/api/routes/users/grantAcess.php', {
                method: "POST",
                body: JSON.stringify({
                    "full_name": nome.value,
                    "senha": senha.value
                }),
                headers: {
                    'Content-Type': "application/json",
                },
            })

            if (!response.ok) {
                throw new Error('Usuário não encontrado');
            }

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

window.submitLogin=submitLogin;
