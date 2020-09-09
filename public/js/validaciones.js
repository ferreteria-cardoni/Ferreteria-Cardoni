
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

        if (NombreP.value == "") {
            document.getElementById("msgidnombre").innerHTML = "Este campo es requerido"
            document.getElementById("msgidnombre").style.display = "block";
            NombreP.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgidnombre").style.display = "none";
            document.getElementById("msgidnombre").innerHTML = ""
            NombreP.style.borderColor = "";
            
            
        }
        
    })
    MarcaP.addEventListener('blur', () => {

        if (MarcaP.value == "") {
            document.getElementById("msgidmarca").innerHTML = "Este campo es requerido"
            document.getElementById("msgidmarca").style.display = "block";
            MarcaP.style.borderColor = "red";
            
        }

        else {
            document.getElementById("msgidmarca").style.display = "none";
            document.getElementById("msgidmarca").innerHTML = ""
            MarcaP.style.borderColor = "";
            
            
        }
        
    })
    DescripcionP.addEventListener('blur', () => {
    })
    PresentacionP.addEventListener('blur', () => {

        if (PresentacionP.value == "") {
            document.getElementById("msgidpresentacion").innerHTML = "Este campo es requerido"
            document.getElementById("msgidpresentacion").style.display = "block";
            PresentacionP.style.borderColor = "red";
            
        }

        
        else {
            document.getElementById("msgidpresentacion").style.display = "none";
            document.getElementById("msgidpresentacion").innerHTML = ""
            PresentacionP.style.borderColor = "";
            
            
        }
        
    })
    CantidadP.addEventListener('blur', () => {

        if (CantidadP.value == "") {
            document.getElementById("msgidcantidad").innerHTML = "Si solo se registra el producto sin stock agregue 0 como valor";
            document.getElementById("msgidcantidad").style.display = "block";
            CantidadP.style.borderColor = "red";
            
        }
        else if(!(CantidadP.value - Math.floor(CantidadP.value)) == 0){
            document.getElementById("msgidcantidad").innerHTML = "Utilize solo números enteros";
            document.getElementById("msgidcantidad").style.display = "block";
            CantidadP.style.borderColor = "red";
        }

        else {
            document.getElementById("msgidcantidad").style.display = "none";
            document.getElementById("msgidcantidad").innerHTML = ""
            CantidadP.style.borderColor = "";
            
            
        }
        
    })
    PrecioP.addEventListener('blur', () => {

        if (PrecioP.value == "") {
            document.getElementById("msgidprecio").innerHTML = "Ingrese un valor adecuado 0.00";
            document.getElementById("msgidprecio").style.display = "block";
            PrecioP.style.borderColor = "red";
            
        }


        else {
            document.getElementById("msgidprecio").style.display = "none";
            document.getElementById("msgidprecio").innerHTML = ""
            PrecioP.style.borderColor = "";
            
            
        }
        
    })
    ProveedorP.addEventListener('blur', () => {

        if (ProveedorP.value == "") {
            document.getElementById("msgidproveedor").innerHTML = "Seleccione uno o mas proveedores";
            document.getElementById("msgidproveedor").style.display = "block";
            ProveedorP.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgidproveedor").style.display = "none";
            document.getElementById("msgidproveedor").innerHTML = ""
            ProveedorP.style.borderColor = "";
            
            
        }
        
    })

