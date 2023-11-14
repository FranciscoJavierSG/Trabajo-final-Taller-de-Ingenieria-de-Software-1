function validar_nombre_departamento(){
    var nombre_departamento = document.forms["ingresar_departamento"]["nombre_departamento"]; 
    if (nombre_departamento.value == "") { 
        alert("Por favor ingrese su name."); 
        nombre_departamento.focus(); 
        return false; 
    } 
    return true;
}

function validar_departamento(){
    var nombre_departamento = document.forms["ingresar_departamento"]["nombre_departamento"]; 
    var rut_encargado = document.forms["ingresar_departamento"]["rut_encargado"]; 
    if (nombre_departamento.value == "") { 
        alert("Por favor ingrese su name."); 
        nombre_departamento.focus(); 
        return false; 
    } 
    if (rut_encargado.value == "") { 
        alert("Por favor ingrese su name."); 
        rut_encargado.focus(); 
        return false; 
    } 
    return true;
    
}