window.onload = function(){
    document.getElementById("btnIngresarDatos").onclick = function(){
        let num1 = prompt("Ingrese el primer número");
        let num2 = prompt("Ingrese el segundo número");
        let respuesta = confirm("Desea confirmar los números ingresados?");
        if(respuesta){
            document.write("Los numeros ingresados son: " + num1 +" y " + num2);
        } else {
            this.onclick();
        }
    }
}
