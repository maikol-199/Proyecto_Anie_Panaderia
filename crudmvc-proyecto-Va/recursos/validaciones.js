
const formulario = document.getElementById("frmRegistrar");

const inputs = document.querySelectorAll('#frmRegistrar input');


const expresiones = {
    numero: /^\d{10,10}$/,
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/,
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    password: /^.{4,12}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/
}

const validar = (e) => {
    switch (e.target.type) {
        case "number":
            validarCampo(expresiones.numero, e.target);

            break;
        case "text":
            validarCampo(expresiones.nombre, e.target);
            break;
        case "email":
            validarCampo(expresiones.correo, e.target);
            break;
        case "password":
            validarCampo(expresiones.password, e.target);
            break;
    }
}



inputs.forEach((input) => {
    input.addEventListener('keyup', validar);
});






const validarCampo = (expresion, input) => {
    if (expresion.test(input.value)) {
        input.classList.remove('incorrecto');
        input.classList.add('correcto');

    } else {
        input.classList.remove('correcto');
        input.classList.add('incorrecto');
    }
}





function frmRegistroU() {
    if (expresiones.numero.test(document.getElementById("cedulaa").value)) {
        if (expresiones.nombre.test(document.getElementById("nombre").value)) {
            if (expresiones.nombre.test(document.getElementById("apellido").value)) {
                if (expresiones.telefono.test(document.getElementById("telefono").value)) {
                    if (expresiones.usuario.test(document.getElementById("usuaru").value)) {
                        if (expresiones.password.test(document.getElementById("contraseña").value)) {
                            if (expresiones.correo.test(document.getElementById("email").value)) {
formulario.submit()
                            }
                        }
                    }
                }
            }
        }
    }
}





