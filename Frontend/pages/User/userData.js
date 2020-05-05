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
       
    }catch(err){
        errModal(err)
    }
}

window.onload = () => {
    fetchUser(token);
}