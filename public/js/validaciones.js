
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

//Formulario de Ventas
const IdVenta = document.querySelector('#idcodventa');
const NombreV = document.querySelector('#nombreventa');
const DireccionV = document.querySelector('#iddireccion');
const NombrePV = document.querySelector('#nombreproducto');
const CantidadV = document.querySelector('#idcantidad');
const TotalV = document.querySelector('#idtotal');

//Formulario de compras
const NombrePC = document.querySelector('#nombreproducto');
const ProveedorC = document.querySelector('#idproveedor');
const CantidadC = document.querySelector('#idcantidad');

//Formulario de Cliente

const idnombrec = document.querySelector('#idnombreC');
const idapellidoC = document.querySelector('#idapellidoC');
const idtelefonoC = document.querySelector('#idtelefonoC');
const idrubro = document.querySelector('#idrubro');
const NIT = document.querySelector('#NIT');
const NCF = document.querySelector('#NCF');
const DireccionC = document.querySelector('#DireccionC');


//expresiones regulares usadas en las validaciones
var solotexto = new RegExp('[a-zA-Z\s]+$');
var NITval = new RegExp('[0-9]{14}');
var NCfinal = new RegExp('[0-9]{11}');
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
if(DireccionV){
    DireccionV.addEventListener('blur', () => {

        if (DireccionV.value == "") {
            document.getElementById("msgiddireccion").innerHTML = "Este campo es obligatorio";
            document.getElementById("msgiddireccion").style.display = "block";
            DireccionV.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgiddireccion").style.display = "none";
            document.getElementById("msgiddireccion").innerHTML = ""
            DireccionV.style.borderColor = "";
            
            
        }
        
    })
}
/* if(NombreV){
    NombreV.addEventListener('blur', () => {

        if (NombreV.value == 0) {
            document.getElementById("msgnombreventa").innerHTML = "Este campo es obligatorio";
            document.getElementById("msgnombreventa").style.display = "block";
            NombreV.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgnombreventa").style.display = "none";
            document.getElementById("msgnombreventa").innerHTML = ""
            NombreV.style.borderColor = "";
            
            
        }
        
    })
} */

if(NombrePV){
    NombrePV.addEventListener('blur', () => {

        if (NombrePV.value ==null) {
            document.getElementById("msgnombreproducto").innerHTML = "Este campo es obligatorio";
            document.getElementById("msgnombreproducto").style.display = "block";
            NombrePV.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgnombreproducto").style.display = "none";
            document.getElementById("msgnombreproducto").innerHTML = ""
            NombrePV.style.borderColor = "";
            
            
        }
        
    })
}

//Formulario de compras

if(NombrePC){
    NombreP.addEventListener('blur', () => {

        if (NombreP.value == "") {
            document.getElementById("msgnombreproducto").innerHTML = "Este campo es requerido"
            document.getElementById("msgnombreproducto").style.display = "block";
            NombreP.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgnombreproducto").style.display = "none";
            document.getElementById("msgnombreproducto").innerHTML = ""
            NombreP.style.borderColor = "";
            
            
        }
        
    })
} 

if(ProveedorC){
    NombreP.addEventListener('blur', () => {

        if (NombreP.value == "") {
            document.getElementById("msgidproveedor").innerHTML = "Este campo es requerido"
            document.getElementById("msgidproveedor").style.display = "block";
            NombreP.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgidproveedor").style.display = "none";
            document.getElementById("msgidproveedor").innerHTML = ""
            NombreP.style.borderColor = "";
            
            
        }
        
    })
}

if(CantidadC){
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

//Formulario Clientes
if(idnombrec){
    idnombrec.addEventListener('blur', () => {

        if (idnombrec.value == "") {
            document.getElementById("msgidnombreC").innerHTML = "Este campo es requerido"
            document.getElementById("msgidnombreC").style.display = "block";
            idnombrec.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgidnombreC").style.display = "none";
            document.getElementById("msgidnombreC").innerHTML = ""
            idnombrec.style.borderColor = "green";
            
            
        }
        
    })
} 
if(idapellidoC){
    idapellidoC.addEventListener('blur', () => {

        if (idapellidoC.value == "") {
            document.getElementById("msgidapellidoC").innerHTML = "Este campo es requerido"
            document.getElementById("msgidapellidoC").style.display = "block";
            idapellidoC.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgidapellidoC").style.display = "none";
            document.getElementById("msgidapellidoC").innerHTML = ""
            idapellidoC.style.borderColor = "green";
            
            
        }
        
    })
} 
if(idtelefonoC){
    idtelefonoC.addEventListener('blur', () => {

        if (idtelefonoC.value == "") {
            document.getElementById("msgidtelefonoC").innerHTML = "Este campo es requerido"
            document.getElementById("msgidtelefonoC").style.display = "block";
            idtelefonoC.style.borderColor = "red";
            
        }
        else if(!valtel.exec(idtelefonoC.value)){
            document.getElementById("msgidtelefonoC").innerHTML = "El formato correcto es 9999-9999 (8 digitos)"
            document.getElementById("msgidtelefonoC").style.display = "block";
            idtelefonoC.style.borderColor = "red";
        }
        else {
            document.getElementById("msgidtelefonoC").style.display = "none";
            document.getElementById("msgidtelefonoC").innerHTML = ""
            idtelefonoC.style.borderColor = "green";
            
            
        }
        
    })
} 
if(idrubro){
    idrubro.addEventListener('blur', () => {

        if (idrubro.value == "") {
            document.getElementById("msgidrubro").innerHTML = "Este campo es requerido"
            document.getElementById("msgidrubro").style.display = "block";
            idrubro.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgidrubro").style.display = "none";
            document.getElementById("msgidrubro").innerHTML = ""
            idrubro.style.borderColor = "green";
            
            
        }
        
    })
} 
if(NIT){
    NIT.addEventListener('blur', () => {

        if (NIT.value == "") {
            document.getElementById("msgNIT").innerHTML = "Este campo es requerido"
            document.getElementById("msgNIT").style.display = "block";
            NIT.style.borderColor = "red";
            
        }
        else if(!NITval.exec(NIT.value)){
            document.getElementById("msgNIT").innerHTML = "El formato correcto es 9999-999999-999-9 (14 digitos)"
            document.getElementById("msgNIT").style.display = "block";
            NIT.style.borderColor = "red";
        }
        else {
            document.getElementById("msgNIT").style.display = "none";
            document.getElementById("msgNIT").innerHTML = ""
            NIT.style.borderColor = "green";
            
            
        }
        
    })
} 
if(NCF){
    NCF.addEventListener('blur', () => {

        if (NCF.value == "") {
            document.getElementById("msgNCF").innerHTML = "Este campo es requerido"
            document.getElementById("msgNCF").style.display = "block";
            NCF.style.borderColor = "red";
            
        }
        else if(!NCfinal.exec(NCF.value)){
            document.getElementById("msgNCF").innerHTML = "El formato correcto es 99999999999 (11 digitos)"
            document.getElementById("msgNCF").style.display = "block";
            NCF.style.borderColor = "red";
        }
        else {
            document.getElementById("msgNCF").style.display = "none";
            document.getElementById("msgNCF").innerHTML = ""
            NCF.style.borderColor = "green";
            
            
        }
        
    })
} 
if(DireccionC){
    DireccionC.addEventListener('blur', () => {

        if (DireccionC.value == "") {
            document.getElementById("msgDireccionC").innerHTML = "Este campo es requerido"
            document.getElementById("msgDireccionC").style.display = "block";
            DireccionC.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgDireccionC").style.display = "none";
            document.getElementById("msgDireccionC").innerHTML = ""
            DireccionC.style.borderColor = "green";
            
            
        }
        
    })
} 
  




  




  

