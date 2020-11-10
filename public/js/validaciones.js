
// Obteniendo los elementos del HTML a través de su id

//const { forEach } = require("lodash");

//const { delay } = require("lodash");

//const { truncate } = require("lodash");

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
const NombreV = document.querySelector('#nombreventa');
const DireccionV = document.querySelector('#iddireccion');
const TabVenta=document.querySelector('#Venta');
const TotalV=document.querySelector('#idtotal');
const AddTab=document.querySelector('#btmVentasTab');
var DelTab=document.querySelectorAll('button.remove');
var dispos=0;


//Formulario de compras
const NombrePC = document.querySelector('#nombreproducto');
const ProveedorC = document.querySelector('#idproveedor');
const CantidadC = document.querySelector('#idcantidad');
const TabCompra=document.querySelector('#Compra');
const TotalCompra=document.querySelector('#totalc');



//Formulario de Cliente

const idnombrec = document.querySelector('#idnombreC');
const idapellidoC = document.querySelector('#idapellidoC');
const idtelefonoC = document.querySelector('#idtelefonoC');
const idrubro = document.querySelector('#idrubro');
const NIT = document.querySelector('#NIT');
const NCF = document.querySelector('#NCF');
const DireccionC = document.querySelector('#DireccionC');

//Formulario Proveedor
const NombreProveedor = document.querySelector('#idnombreProve');
const TelefonoProveedor = document.querySelector('#idtelefonoProve');
const CorroProveedor = document.querySelector('#idcorreoProve');


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
//formulario registro de Productos 
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
if(CantidadP && PresentacionP){
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
//Formulario Ventas
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

if(NombreV){
    NombreV.addEventListener('blur', () => {

        if (NombreV.value == 0) {
            document.getElementById("msgnombreventa").innerHTML = "Este campo es requerido"
            document.getElementById("msgnombreventa").style.display = "block";
            NombreV.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgnombreventa").style.display = "none";
            document.getElementById("msgnombreventa").innerHTML = ""
            NombreV.style.borderColor = "";
            
            
        }
        
    })
}
function NombreProductoVenta(){
    var NombrePV = document.querySelectorAll('input.a');
    var cant = document.querySelectorAll('input.b');
    var cantMod = document.querySelectorAll('input.m');
    var stock = document.querySelectorAll('span.s');   
    var msg="";
    for(var i=0;i<NombrePV.length;i++){
        var uno=NombrePV[i].value.split("$");
        var disponible=0;     
        //console.log(stock[18].innerHTML);
        for(var j=0;j<stock.length;j++){
            var ver =stock[j].innerHTML.split("$");
            //console.log(uno[0]);
            //console.log(ver[0]);
            if(uno[0] == ver[0]){
                disponible=ver[1]; 
                //console.log(disponible);
                break;
            }
            //console.log(stock[j].innerHTML); 
        }
        //Disponibilidad(uno[0]); 
            if (NombrePV[i].value == "") {
                document.getElementById("msgnombreproductoV").style.display = "block";
                document.getElementById("msgnombreproductoV").innerHTML = "Seleccione un producto"
                NombrePV[i].style.borderColor = "red";
                NombrePV[i].style.borderWidth = "3px";
                $('#btmVentasTab').attr('disabled',true);
                cant[i].disabled="true";
                var ctrl=1;
            }
            else {
                document.getElementById("msgnombreproductoV").style.display = "none";
                document.getElementById("msgnombreproductoV").innerHTML = ""
                NombrePV[i].style.borderColor = "";
                NombrePV[i].style.borderWidth = "2px";
                cant[i].disabled="";
                var ctrl=0;
    
    
                if (cant[i].value == "") {
                    msg = "La cantidad ingresada debe ser superior a 0 ";
                    //document.getElementById("msgidcantidadV").style.display = "block";
                    cant[i].style.borderColor = "red";
                    cant[i].style.borderWidth = "3px";
                    $('#btmVentasTab').attr('disabled',true);
                    
                    
                }
                else if(!(cant[i].value - Math.floor(cant[i].value)) == 0){
                    msg = "Utilize solo números enteros";
                    //document.getElementById("msgidcantidadV").style.display = "block";
                    cant[i].style.borderColor = "red";
                    cant[i].style.borderWidth = "3px";
                    
                    
                }
                else if(disponible){
                    if(cantMod[i]){                        
                        var totmod=disponible*1+cantMod[i].value*1;
                        if(cant[i].value>totmod){
                            msg = "Insuficiente stock del "+[i+1]+"° producto, disponibles: "+totmod;
                            //document.getElementById("msgidcantidadV").style.display = "block";
                            cant[i].style.borderColor = "red";
                            cant[i].style.borderWidth = "3px"; 
                        } else {
                            //document.getElementById("msgidcantidadV").style.display = "none";
                            //document.getElementById("msgidcantidadV").innerHTML = ""
                            cant[i].style.borderColor = "";
                            cant[i].style.borderWidth = "2px";         
                        }
                    }else{
                        
                        if(cant[i].value>(disponible*1)){
                            msg = "Insuficiente stock del "+[i+1]+"° producto, disponibles: "+disponible;
                            //document.getElementById("msgidcantidadV").style.display = "block";
                            cant[i].style.borderColor = "red";
                            cant[i].style.borderWidth = "3px"; 
                        } else {
                            //document.getElementById("msgidcantidadV").style.display = "none";
                            //document.getElementById("msgidcantidadV").innerHTML = ""
                            cant[i].style.borderColor = "";
                            cant[i].style.borderWidth = "2px";         
                        }
                        
                    }                      
                }
                else {
                    cant[i].style.borderColor = "";
                    cant[i].style.borderWidth = "2px";         
                }
            }       
            if(msg!=""){
                document.getElementById("msgidcantidadV").innerHTML = msg;
                document.getElementById("msgidcantidadV").style.display = "block";
                $('#btmVentasTab').attr('disabled',true);
                $('#btmsubmitV').attr('disabled',true); 
            }else if(ctrl== 0){
                document.getElementById("msgidcantidadV").style.display = "none";
                document.getElementById("msgidcantidadV").innerHTML = "";
                $('#btmVentasTab').attr('disabled',false);
                $('#btmsubmitV').attr('disabled',false); 
            }  
                 
    }

};
function Total(){
    var NombrePV = document.querySelectorAll('input.a');
    var cant = document.querySelectorAll('input.b');
    var total=0; 
    for(var i=0;i<NombrePV.length;i++){
        var uno=NombrePV[i].value.split("$");
        if(!isNaN(uno[1]*1) && !isNaN((cant[i].value)*1)){
            total = total+((uno[1]*1)*(cant[i].value)*1);
        }
    }
    
    total = total.toFixed(2);

    TotalV.value= "$"+total;
}
function dispo(msg){
    dispos=msg;
}
if(TabVenta){
    TabVenta.addEventListener('click', () => {
        //setTimeout(NombreProductoVenta,1000);
        NombreProductoVenta();     
    }) 
     TabVenta.addEventListener('change', () => {
        NombreProductoVenta();
        Total(); 
             
    }) 
    TabVenta.addEventListener('mousemove', () => {
        Total();     
    })
    
}
//Formulario de compras

if(ProveedorC){
    ProveedorC.addEventListener('blur', () => {

        if (ProveedorC.value == 0) {
            document.getElementById("msgidproveedor").innerHTML = "Este campo es requerido"
            document.getElementById("msgidproveedor").style.display = "block";
            ProveedorC.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgidproveedor").style.display = "none";
            document.getElementById("msgidproveedor").innerHTML = ""
            ProveedorC.style.borderColor = "";
            
            
        }
        
    })
}

function NombreProductoCompra(){
    if(ProveedorC.value == 0){
        
    }else{
        var NombrePC = document.querySelectorAll('input.a');
        var cantC = document.querySelectorAll('input.b');
        var precioC = document.querySelectorAll('input.c');
        var totalC=0;
        var msg="";
        for(var i=0;i<NombrePC.length;i++){
            if (NombrePC[i].value == "") {
                document.getElementById("msgnombreproducto").innerHTML = "Este campo es requerido"
                document.getElementById("msgnombreproducto").style.display = "block";
                NombrePC[i].style.borderColor = "red";
                NombrePC[i].style.borderWidth = "3px";
                cantC[i].disabled="true";
                precioC[i].disabled="true";
                $('#btmComprasTab').attr('disabled',true);
                $('#btmsubmitC').attr('disabled',true);
                var ctrl = 1;
            }
            else {
                document.getElementById("msgnombreproducto").style.display = "none";
                document.getElementById("msgnombreproducto").innerHTML = ""
                NombrePC[i].style.borderColor = "";
                NombrePC[i].style.borderWidth = "2px";
                $('#btmComprasTab').attr('disabled',false);
                cantC[i].disabled="";
                precioC[i].disabled="";
                var ctrl = 0;

                if (cantC[i].value == "") {
                    msg = "La cantidad ingresada debe ser superior a 0 ";
                    cantC[i].style.borderColor = "red";
                    cantC[i].style.borderWidth = "3px";                   
                }
                else if(!(cantC[i].value - Math.floor(cantC[i].value)) == 0){
                    msg = "La cantidad ingresada debe ser entera ";
                    cantC[i].style.borderColor = "red";
                    cantC[i].style.borderWidth = "3px";                   
                }
                else {
                    cantC[i].style.borderColor = "";
                    cantC[i].style.borderWidth = "2px";
                }               
            }
            if(msg!="" ){
                document.getElementById("msgidcantidad").innerHTML = msg;
                document.getElementById("msgidcantidad").style.display = "block";               
                $('#btmComprasTab').attr('disabled',true);
                $('#btmsubmitC').attr('disabled',true);
            }else if(ctrl== 0){
                document.getElementById("msgidcantidad").style.display = "none";
                document.getElementById("msgidcantidad").innerHTML = "";
                $('#btmComprasTab').attr('disabled',false);
                $('#btmsubmitC').attr('disabled',false);
            }  
    
           totalC=totalC+((cantC[i].value*1)*(precioC[i].value*1));     
        }
        
        TotalCompra.value='$'+totalC.toFixed(2);
        
         
    }


}
if(TabCompra){
    TabCompra.addEventListener('click', () => {
        NombreProductoCompra();     
    })
    TabCompra.addEventListener('change', () => {
        NombreProductoCompra();     
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

//Proveedores
if(NombreProveedor){
    NombreProveedor.addEventListener('blur', () => {

        if (NombreProveedor.value == "" ) {
            document.getElementById("msgidnombreProve").innerHTML = "Este campo es requerido"
            document.getElementById("msgidnombreProve").style.display = "block";
            NombreProveedor.style.borderColor = "red";
            
        }
        else {
            document.getElementById("msgidnombreProve").style.display = "none";
            document.getElementById("msgidnombreProve").innerHTML = ""
            NombreProveedor.style.borderColor = "";
            
            
        }
        
    })
}
if(TelefonoProveedor){
    TelefonoProveedor.addEventListener('blur', () => {

        if (TelefonoProveedor.value == "") {
            document.getElementById("msgidtelefonoProve").innerHTML = "Este campo es requerido"
            document.getElementById("msgidtelefonoProve").style.display = "block";
            TelefonoProveedor.style.borderColor = "red";
            
        }
        else if(!valtel.exec(TelefonoProveedor.value)){
            document.getElementById("msgidtelefonoProve").innerHTML = "El formato correcto es 9999-9999 (8 digitos)"
            document.getElementById("msgidtelefonoProve").style.display = "block";
            TelefonoProveedor.style.borderColor = "red";
        }
        else {
            document.getElementById("msgidtelefonoProve").style.display = "none";
            document.getElementById("msgidtelefonoProve").innerHTML = ""
            TelefonoProveedor.style.borderColor = "green";
            
            
        }
        
    })
}
if(CorroProveedor){
    CorroProveedor.addEventListener('blur', () => {

        if (CorroProveedor.value == "") {
            document.getElementById("msgidcorreoProve").innerHTML = "Este campo es requerido"
            document.getElementById("msgidcorreoProve").style.display = "block";
            CorroProveedor.style.borderColor = "red";
            
        }
        else if(!valcorreos.exec(CorroProveedor.value)){
            document.getElementById("msgidcorreoProve").innerHTML = "El formato correcto es ejemplo@gmail.com"
            document.getElementById("msgidcorreoProve").style.display = "block";
            CorroProveedor.style.borderColor = "red";
        }
        else {
            document.getElementById("msgidcorreoProve").style.display = "none";
            document.getElementById("msgidcorreoProve").innerHTML = ""
            CorroProveedor.style.borderColor = "green";
            
            
        }
        
    })
}




  




  

