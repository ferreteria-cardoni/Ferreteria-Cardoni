
// Obteniendo los elementos del HTML a través de su id
//formulario Registro productos
const NombreP = document.querySelector('#idnombre');
const MarcaP = document.querySelector('#idmarca');
const DescripcionP = document.querySelector('#iddescripcion');
const PresentacionP = document.querySelector('#idpresentacion');
const CantidadP = document.querySelector('#idcantidad');
const PrecioP = document.querySelector('#idprecio');
const ProveedorP = document.querySelector('#idproveedor');




//expresiones regulares usadas en las validaciones
var solotexto = new RegExp('[a-zA-Z\s]+$');
var valtel = new RegExp('[0-9]{8}');
var valcorreos = new RegExp('[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+');
var valdui = new RegExp('[0-9]{8}-[0-9]{1}');


//funciones

// Eventos
//formulario registro de pacientes
NombreP.addEventListener('blur', () => {

    if (nombre.value == "") {
        //document.getElementById("msgnombre").innerHTML = "Este campo es requerido"
        //document.getElementById("msgnombre").style.display = "block";
        NombreP.style.borderColor = "red";
        
    }
    else if (!solotexto.exec(nombre.value)) {
        //document.getElementById("msgnombre").innerHTML = "El formato no coincide "
        //document.getElementById("msgnombre").style.display = "block";
        NombreP.style.borderColor = "red";
        
    }
    else {
        //document.getElementById("msgnombre").style.display = "none";
        //document.getElementById("msgnombre").innerHTML = ""
        NombreP.style.borderColor = "";
        
        
    }
    
})
apellido.addEventListener('blur', () => {
    if (apellido.value == "") {
        document.getElementById("msgapellido").innerHTML = "Este campo es requerido"
        document.getElementById("msgapellido").style.display = "block";
        apellido.style.borderColor = "red";
        
    }
    else if (!solotexto.exec(apellido.value)) {
        document.getElementById("msgapellido").innerHTML = "El formato no coincide "
        document.getElementById("msgapellido").style.display = "block";
        apellido.style.borderColor = "red";
        
    }
    else {
        document.getElementById("msgapellido").style.display = "none";
        document.getElementById("msgapellido").innerHTML = ""
        apellido.style.borderColor = "";
        crearNumClinico();
        
    }
    
})

dui.addEventListener('blur', () => {
    if (dui.value == "") {
        document.getElementById("msgdui").innerHTML = "Este campo es requerido"
        document.getElementById("msgdui").style.display = "block";
        dui.style.borderColor = "red";
       

    }
    else if (!valdui.exec(dui.value)) {
        document.getElementById("msgdui").innerHTML = "El formato no coincide "
        document.getElementById("msgdui").style.display = "block";
        dui.style.borderColor = "red";
        
    }
    else {
        document.getElementById("msgdui").style.display = "none";
        dui.style.borderColor = "";
        
    }
    
})

telefono.addEventListener('blur', () => {
    if (telefono.value == "") {
        document.getElementById("msgtel").innerHTML = "Este campo es requerido"
        document.getElementById("msgtel").style.display = "block";
        telefono.style.borderColor = "red";
        
    }
    else if (!valtel.exec(telefono.value)) {
        document.getElementById("msgtel").innerHTML = "El formato no coincide "
        document.getElementById("msgtel").style.display = "block";
        telefono.style.borderColor = "red";
        
    }
    else {
        document.getElementById("msgtel").style.display = "none";
        telefono.style.borderColor = "";
        
    }
    
})
telefonoResp.addEventListener('blur', () => {
    if (telefono.value == "") {
        document.getElementById("msgtel2").style.display = "none";
        telefonoResp.style.borderColor = "";
        
    }
    else if (!valtel.exec(telefonoResp.value)) {
        document.getElementById("msgtel2").innerHTML = "El formato no coincide "
        document.getElementById("msgtel2").style.display = "block";
        telefonoResp.style.borderColor = "red";
        
    }
    else {
        document.getElementById("msgtel2").style.display = "none";
        telefonoResp.style.borderColor = "";
        
    }
    
})
correo.addEventListener('blur', () => {
    if (correo.value == "") {        
        document.getElementById("msgcorreo").style.display = "none";
        correo.style.borderColor = "";
        
    }
    if (!valcorreos.exec(correo.value)) {
        document.getElementById("msgcorreo").innerHTML = "El formato no coincide "
        document.getElementById("msgcorreo").style.display = "block";
        correo.style.borderColor = "red";
        
    }
    else {
        document.getElementById("msgcorreo").style.display = "none";
        correo.style.borderColor = "";
        
    }
    
})

sexo.addEventListener('blur', () => {
    if (sexo.value == "0") {
        document.getElementById("msgsexo").innerHTML = "Este campo es requerido"
        document.getElementById("msgsexo").style.display = "block";
        sexo.style.borderColor = "red";
        
    } else {
        document.getElementById("msgsexo").style.display = "none";
        sexo.style.borderColor = "";
        
    }
    
})
Presp.addEventListener('blur', () => {
    if (Presp.value == "") {
        document.getElementById("msgPresp").style.display = "none";
        Presp.style.borderColor = "";
        
    }
    else if (!solotexto.exec(Presp.value)) {
        document.getElementById("msgPresp").innerHTML = "El formato no coincide "
        document.getElementById("msgPresp").style.display = "block";
        Presp.style.borderColor = "red";
        
    }
    else {
        document.getElementById("msgPresp").style.display = "none";
        Presp.style.borderColor = "";
        
    }
    
})
