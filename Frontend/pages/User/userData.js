let name = document.getElementById('name')
let entrada = document.getElementById('entrada');
let cargo = document.getElementById('cargo')
let email = document.getElementById('email')
let telefone = document.getElementById('telefone')

let formUser = document.getElementById("form-update")
let newUserForm = document.getElementById("form-cad-user")

const display = (number) => {
    let section = document.getElementsByClassName('section');
    for (i = 0; i < section.length; ++i) {
        if (i == number) {
            if (i == 0) {
                fetchUser();
            }
            section[i].style.display = "inline";
        } else {
            section[i].style.display = "none";
        }
    }
}

const putData = (user) => {
    let entradaDate = new Date(user.entrada);

    name.innerHTML = user.full_name
    entrada.innerHTML = (entradaDate.getDate() + 1) + "/" + (entradaDate.getMonth() + 1) + "/" + entradaDate.getFullYear();
    cargo.innerHTML = user.cargo
    email.innerHTML = user.email;
    telefone.innerHTML = mphone(user.telefone)
}

const fetchUser = async () => {
    try {
        const response = await fetch(url + "users/read.php", {
            method: 'GET',
            headers: {
                authorization: `Bearer ${token}`
            },
            body: null
        })
        let user = await response.json();
        deactivateLoader();
        localStorage.setItem("codUser", user.codUser);
        putData(user);
    } catch (err) {
        errModal(err)
    }
}

const updateUser = async e => {
    e.preventDefault();
    let inputs = formUser.elements;
    if (checkFormValidityUser(inputs)) {
        try {

            let body = getBody(inputs);
            const response = fetch(url + "users/update.php", {
                method: "PATCH",
                body,
                headers: {
                    authorization: `Bearer ${token}`,
                    'Content-Type': "application/json",
                }
            })
            formUser.reset();
        } catch (err) {
            errModal("Algum campo está vazio");
            formUser.reset()
            return;
        }
    }
}

const exit = () => {
    boxContent.style.display = "none"
    boxContentSpinner.innerHTML = loadingSpinner;
}


const newUser = async e => {
    e.preventDefault();
    let inputs = newUserForm.elements;
    if (checkFormValidityUser(inputs)) {
        try {

            let body = getBody(inputs);
            const response = fetch(url + "users/create.php", {
                method: "POST",
                body,
                headers: {
                    authorization: `Bearer ${token}`,
                    'Content-Type': "application/json",
                }
            })
            newUserForm.reset();
        } catch (err) {
            errModal("Algum campo está vazio");
            formUser.reset()
            return;
        }
    }
}


window.onload = () => {
    activateLoader();
    fetchUser();
}
