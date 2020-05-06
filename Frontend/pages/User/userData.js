const display=(number)=>{
    let section=document.getElementsByClassName('section');
    for(i=0;i<section.length;++i){
        if(i==number){
            section[i].style.display="inline";
        }else{
            section[i].style.display="none";
        }
    }
}

const fetchUser = async (tok) => {
    try {
        const response = await fetch(url + "users/read.php", {
            method: 'GET',
            headers: {
                authorization: `Bearer ${tok}`
            },
            body:null
        })
        let user =await response.json();
        putData(user);
    }catch(err){
        errModal(err)
    }
}

const putData=(user)=>{
    let name=document.getElementById('name')
    let entrada=document.getElementById('entrada');
    let cargo=document.getElementById('cargo')

    let entradaDate=new Date(user.entrada);
    
    name.innerHTML=user.full_name
    entrada.innerHTML=(entradaDate.getDate()+1)+"/"+(entradaDate.getMonth()+1)+"/"+entradaDate.getFullYear();
    cargo.innerHTML=user.cargo
}

window.onload = () => {
    fetchUser(token);
}