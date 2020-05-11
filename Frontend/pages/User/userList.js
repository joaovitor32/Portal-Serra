let field = document.getElementById('box-cursos-item')
let codUserLog = localStorage.getItem('codUser')

let usersArray = []

const searchName = event => {
    let filteredArray = usersArray.filter(element =>
        element.full_name.toLowerCase().includes(event.target.value) ||
        element.telefone.includes(event.target.value) ||
        element.email.includes(event.target.value)||
        element.full_name.includes(event.target.value)
    );
    putUsers(filteredArray)
}

const storeUsers = (array) => {
    array.forEach(element => {
        usersArray.push(element);
    })
}

const putUsers = (users) => {
    let htmlUsers = "";
    if (users.length == 0) {
        htmlUsers="<div id='emptyArray'><p>Nenhum membro encontrado</p></div>"
    } else {
        users.forEach(user => {
            if (user.codUser != codUserLog) {
                let data=new Date(user.entrada);
                htmlUsers += "<div class='card'>";
                htmlUsers += '<div class="card-inner">';
                htmlUsers += '<div class="header">';
                htmlUsers += `<h2>Nome: ${user.full_name}</h2>`;
                htmlUsers += '</div>';
                htmlUsers += '<div class="content">';
                htmlUsers += `<p>Telefone: ${user.telefone}</p>`;
                htmlUsers += `<p>Cargo: ${user.cargo}</p>`;
                htmlUsers += `<p>Email: ${user.email}</p>`;
                htmlUsers += `<p>Entrada: ${(data.getDate() + 1) + "/" + (data.getMonth() + 1) + "/" + data.getFullYear()}</p>`;
                htmlUsers += `<img id="logo-can" onclick="deleteUser(${user.codUser})" src="../../components/icons/can.svg" />`;
                htmlUsers += '</div></div></div>';
            }

        });
    }
    field.innerHTML = htmlUsers;
    cardEffects();
}

const deleteUser = async (codUser) => {
    try {
        const response = await fetch(url + "users/delete.php", {
            method: 'DELETE',
            body: JSON.stringify(
                { 'codUser': codUser }
            ),
            headers: {
                authorization: `Bearer ${token}`,
            }
        })
        if (!response.ok) {
            errModal("Verifique se este usuário tem mensagens associadas");
        }
        fetchUsers();
    } catch (err) {
        errModal(err);
        return;
    }
}

const fetchUsers = async () => {
    activateLoader();
    try {
        const response = await fetch(url + "users/index.php", {
            method: "GET",
            body: null,
            headers: {
                authorization: `Bearer ${token}`,
            }
        })
        const users = await response.json();
        storeUsers(users);
        putUsers(users);
        deactivateLoader()
    } catch (err) {
        errModal(err);
        return;
    }
}

window.onload = () => {
    fetchUsers();
}
window.onbeforeunload = () => {
    localStorage.removeItem('codUser');
}