//******************************************************** */
//hay que hacer una para c/u
function validar_nombre_encargado(){
    var nombre_encargado = document.forms["ingresar_encargado"]["nombre_encargado"]; 
    if (nombre_encargado.value == 0) { 
        alert("Por favor ingrese su name."); 
        nombre_encargado.focus(); 
        return false; 
    } 
    return true;
}
function validar_rut_encargado(){
    var rut_encargado = document.forms["ingresar_encargado"]["rut_encargado"]; 
    if (rut_encargado.value == 0) { 
        alert("Por favor ingrese su rut."); 
        rut_encargado.focus(); 
        return false; 
    } 
    return true;
}




function validar_encargado() { 
    var nombre_encargado = document.forms["ingresar_encargado"]["nombre_encargado"]; 
    var rut_encargado = document.forms["ingresar_encargado"]["rut_encargado"]; 
    
    if (nombre_encargado.value == "") { 
        window.alert("Please enter your name."); 
        nombre_encargado.focus(); 
        return false; 
    } 
    if (rut_encargado.value == "") { 
        window.alert("Please enter your name."); 
        rut_encargado.focus(); 
        return false; 
    } 


    return true; 
} 

function validar_respuesta(){
    if(document.getElementById("respuesta").value == '')
    {
        alert("Por favor ingrese su respuesta");
        document.getElementById("respuesta").style.display ="none";
    }
}