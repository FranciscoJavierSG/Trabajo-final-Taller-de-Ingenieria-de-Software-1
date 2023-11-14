
//******************************************************** */
//hay que hacer una para c/u
function validar_nombre_ciudadano(){
    var nombre_ciudadano = document.forms["ingresar_ciudadano"]["nombre_ciudadano"]; 
    if (nombre_ciudadano.value == 0) { 
        document.getElementById("label_nombre").style.color="red";
        nombre_ciudadano.focus(); 
        return false; 
    } 
    return true;
}
function validar_apellido_ciudadano(){
    var apellido_ciudadano = document.forms["ingresar_ciudadano"]["apellido_ciudadano"]; 
    if (apellido_ciudadano.value == 0) { 
        alert("Por favor ingrese su apellido."); 
        apellido_ciudadano.focus(); 
        return false; 
    } 
    return true;
}
function validar_rut_ciudadano(){
    var rut = document.forms["ingresar_ciudadano"]["rut"]; 
    if (rut.value == 0) { 
        alert("Por favor ingrese su rut."); 
        rut.focus(); 
        return false; 
    } 
    return true;
}
function validar_email_ciudadano(){
    var email_ciudadano = document.forms["ingresar_ciudadano"]["email_ciudadano"]; 
    if (email_ciudadano.value == 0) { 
        alert("Por favor ingrese su email."); 
        email_ciudadano.focus(); 
        return false; 
    } 
    return true;
}
function validar_solicitud_ciudadano(){
    var nombre_ciudadano = document.forms["ingresar_ciudadano"]["apellido_ciudadano"]; 
    if (nombre_ciudadano.value == "") { 
        alert("Por favor ingrese su solicitud."); 
        nombre_ciudadano.focus(); 
        return false; 
    } 
    return true;
}
function validar_informacion_consulta_ciudadano(){
    var informacion_consulta = document.forms["ingresar_ciudadano"]["informacion_consulta"]; 
    if (informacion_consulta.value == "") { 
        alert("Por favor ingrese su consulta."); 
        informacion_consulta.focus(); 
        return false; 
    } 
    return true;
}


function validar_ciudadano() { 
    var nombre_ciudadano = document.forms["ingresar_ciudadano"]["nombre_ciudadano"]; 
    var apellido_ciudadano = document.forms["ingresar_ciudadano"]["apellido_ciudadano"]; 
    var rut = document.forms["ingresar_ciudadano"]["rut"]; 
    var email_ciudadano = document.forms["ingresar_ciudadano"]["email_ciudadano"]; 
    var solicitud = document.forms["ingresar_ciudadano"]["solicitud"]; 
    var informacion_consulta = document.forms["ingresar_ciudadano"]["informacion_consulta"]; 

    if (nombre_ciudadano.value == "") { 
        window.alert("Porfavor ingrese los datos."); 
        nombre_ciudadano.focus(); 
        return false; 
    } 
    if (apellido_ciudadano.value == "") { 
        window.alert("Porfavor ingrese los datos."); 
        apellido_ciudadano.focus(); 
        return false; 
    } 

   

    if (email_ciudadano.value == "") { 
        window.alert( 
          "Ingrese un email valido."); 
          email_ciudadano.focus(); 
        return false; 
    } 

    if (rut.value == "") { 
        window.alert( 
          "Ingrese su rut."); 
          rut.focus(); 
        return false; 
    } 

    if (solicitud.value == "") { 
        window.alert("Ingrese su solicitud"); 
        solicitud.focus(); 
        return false; 
    } 

    if (informacion_consulta =="") { 
        window.alert("Ingrese su consulta."); 
        informacion_consulta.focus(); 
        return false; 
    } 

    return true; 
} 

