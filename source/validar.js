function validar() {
    var nombre, correo, carrera, celular, semestre, contrasena, contrasena2;
    nombre = document.getElementsByName("nombre").value;
    correo = document.getElementsById("correo").value;
    carrera = document.getElementsById("carrera").value;
    celular = document.getElementsById("celular").value;
    semestre = document.getElementsById("semestre").value;
    contrasena = document.getElementsById("contrasena").value;
    contrasena2 = document.getElementsById("contrasena").value;
    
    if(nombre === ""|| correo === "" || carrera === "" || celular === "" || semestre === "" || contrasena=== ""||contrasena2 === ""){
        alert("El campo esta vacio")
        return false
    }
    

}