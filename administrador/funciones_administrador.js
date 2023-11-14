//******************************************************** */
//hay que hacer una para c/u
function validar_nombre_ciudadano(){
    var rut_administrador = document.forms["ingresar_administrador"]["rut_administrador"]; 
    if (rut_administrador.value == 0) { 
        alert("Por favor ingrese su rut."); 
        rut_administrador.focus(); 
        return false; 
    } 
    return true;
}
function validar_contrasena_administrador(){
    var contrasena_administrador = document.forms["ingresar_administrador"]["contrasena_administrador"]; 
    if (contrasena_administrador.value == 0) { 
        alert("Por favor ingrese su contrasena."); 
        contrasena_administrador.focus(); 
        return false; 
    } 
    return true;
}


function validar_administrador() { 
    var rut_administrador = document.forms["ingresar_administrador"]["rut_administrador"]; 
    var contrasena_administrador = document.forms["ingresar_administrador"]["contrasena_administrador"]; 
    if (rut_administrador.value == 0) { 
        alert("Por favor ingrese su rut."); 
        rut_administrador.focus(); 
        return false; 
    } 
    if (contrasena_administrador.value == 0) { 
        alert("Por favor ingrese su contrasena."); 
        contrasena_administrador.focus(); 
        return false; 
    } 
    return true;
} 

