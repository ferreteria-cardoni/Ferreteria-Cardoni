
// Obteniendo los elementos del HTML a través de su id
//formulario Registro productos
const NombreP = document.querySelector('#idnombre');
const MarcaP = document.querySelector('#idmarca');
const DescripcionP = document.querySelector('#iddescripcion');
const PresentacionP = document.querySelector('#idpresentacion');
const CantidadP = document.querySelector('#idcantidad');
const PrecioP = document.querySelector('#idprecio');
const ProveedorP = document.querySelector('#idproveedor');
const IdProductoP = document.querySelector('#idproducto');




//expresiones regulares usadas en las validaciones
var solotexto = new RegExp('[a-zA-Z\s]+$');
var valtel = new RegExp('[0-9]{8}');
var valcorreos = new RegExp('[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+');
var valdui = new RegExp('[0-9]{8}-[0-9]{1}');
var valcodProducto= new RegExp('([A-Z]|[a-z]){3}([0-9]){3}');


//funciones

// Eventos
//formulario registro de pacientes 
if(NombreP){
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
} 
if(MarcaP){
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
}    
if(DescripcionP){
    DescripcionP.addEventListener('blur', () => {
    }) 
}   
if(PresentacionP){
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
}
if(CantidadP){
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
}

if(PrecioP){
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
}

if(ProveedorP){
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
}

if(IdProductoP){
    IdProductoP.addEventListener('blur', () => {

        if (IdProductoP.value == "") {
            document.getElementById("msgidproducto").innerHTML = "Este campo es requerido"
            document.getElementById("msgidproducto").style.display = "block";
            IdProductoP.style.borderColor = "red";
            
        }
        else if(!valcodProducto.exec(IdProductoP.value)){
            document.getElementById("msgidproducto").innerHTML = "El formato correcto es aaa111"
            document.getElementById("msgidproducto").style.display = "block";
            IdProductoP.style.borderColor = "red";
        }
        
        else {
            document.getElementById("msgidproducto").style.display = "none";
            document.getElementById("msgidproducto").innerHTML = ""
            IdProductoP.style.borderColor = "";
            
            
        }
        
    })
}





  

