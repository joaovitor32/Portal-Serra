const mask = (o, f) => {
    setTimeout(function () {
        var v = mphone(o.value);
        if (v != o.value) {
            o.value = v;
        }
    }, 1);
}

const mphone = (v) => {
    var r = v.replace(/\D/g, "");
    r = r.replace(/^0/, "");
    if (r.length > 10) {
        r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (r.length > 5) {
        r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
    } else if (r.length > 2) {
        r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
    } else {
        r = r.replace(/^(\d*)/, "($1");
    }
    return r;
}

const checkFormValidityUser = (inputs) => {
    let validity = false;

    Object.values(inputs).forEach(element => {
        if (element.tagName.toLowerCase() == "input") {
            validity = true;
            element.classList.remove('input-error');
            if (element.value.length == 0) {
                element.classList.add('input-error');
                validity = false
            }
            switch (element.name) {
                case "email":
                    let pattern = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
                    if (pattern.match(element.value)) {
                        element.classList.add('input-error');
                        validity = false;
                        break;
                    }
                case "telefone":
                    if (element.value.length < 9) {
                        element.classList.add('input-error');
                        validity = false;
                    } 
                    break;
            }

        }
    });
    return validity;
}

const getBody = (inputs) => {
    let body = {}
    Object.values(inputs).forEach(element => {
        if (element.tagName.toLowerCase() == "input") {
            body[element.name] = element.value
        }
    })
    return JSON.stringify(body);
}