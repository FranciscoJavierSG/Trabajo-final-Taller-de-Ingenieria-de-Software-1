//******************************************************** */
//hay que hacer una para c/u
function validar_rut_usuario(){
    var rut_usuario = document.forms["ingresar_administrador"]["rut_usuario"]; 
    if (rut_usuario.value == 0) { 
        alert("Por favor ingrese su rut."); 
        rut_usuario.focus(); 
        return false; 
    } 
    return true;
}
function validar_contrasena_usuario(){
    var contrasena_usuario = document.forms["ingresar_administrador"]["contrasena_usuario"]; 
    if (contrasena_usuario.value == 0) { 
        alert("Por favor ingrese su contrasena."); 
        contrasena_usuario.focus(); 
        return false; 
    } 
    return true;
}
function validar_nombre_usuario(){
    var nombre_usuario = document.forms["ingresar_administrador"]["nombre_usuario"]; 
    if (nombre_usuario.value == 0) { 
        alert("Por favor ingrese su contrasena."); 
        nombre_usuario.focus(); 
        return false; 
    } 
    return true;
}
function validar_apellido_usuario(){
    var apellido_usuario = document.forms["ingresar_administrador"]["apellido_usuario"]; 
    if (apellido_usuario.value == 0) { 
        alert("Por favor ingrese su contrasena."); 
        apellido_usuario.focus(); 
        return false; 
    } 
    return true;
}


function validar_usuario() { 
    var rut_usuario = document.forms["ingresar_usuario"]["rut_usuario"]; 
    var contrasena_usuario = document.forms["ingresar_usuario"]["contrasena_usuario"]; 
    var nombre_usuario = document.forms["ingresar_usuario"]["nombre_usuario"]; 
    var apellido_usuario = document.forms["ingresar_usuario"]["apellido_usuario"]; 

    if (rut_usuario.value == 0) { 
        alert("Por favor ingrese su rut."); 
        rut_usuario.focus(); 
        return false; 
    } 
    if (contrasena_usuario.value == 0) { 
        alert("Por favor ingrese su contrasena."); 
        contrasena_usuario.focus(); 
        return false; 
    } 
    
    if (nombre_usuario.value == 0) { 
        alert("Por favor ingrese su contrasena."); 
        nombre_usuario.focus(); 
        return false; 
    } 
    
    if (apellido_usuario.value == 0) { 
        alert("Por favor ingrese su contrasena."); 
        apellido_usuario.focus(); 
        return false; 
    } 
    return true;
} 


function validar_perfil() { 
   
    var contrasena_usuario = document.forms["editar_perfil"]["contrasena_usuario"]; 
    var nombre_usuario = document.forms["editar_perfil"]["nombre_usuario"]; 
    var apellido_usuario = document.forms["editar_perfil"]["apellido_usuario"]; 

    if (rut_usuario.value == 0) { 
        alert("Por favor ingrese su rut."); 
        rut_usuario.focus(); 
        return false; 
    } 
    if (contrasena_usuario.value == 0) { 
        alert("Por favor ingrese su contrasena."); 
        contrasena_usuario.focus(); 
        return false; 
    } 
    
    if (nombre_usuario.value == 0) { 
        alert("Por favor ingrese su contrasena."); 
        nombre_usuario.focus(); 
        return false; 
    } 
    
    if (apellido_usuario.value == 0) { 
        alert("Por favor ingrese su contrasena."); 
        apellido_usuario.focus(); 
        return false; 
    } 
    return true;
} 

