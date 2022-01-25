<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function print_f($variable){
    if(is_array($variable)){
        $archivo = fopen('datos.txt','w+'); //se sobreescribe cada vez que se crea el archivo
                                            //con +a se agrega al final de la linea si es que 
                                            //el archivo tiene contenido
        foreach($variable as $item){
            fwrite($archivo, $item);
        }
        fclose($archivo);
    } else{
        file_put_contents("datos.txt",$variable);
        //No necesita fclose ya que file_up_contents cierra el archivo automaticamente
    }
}

$aNotas = array(8,5,7,9,10);
$msg = "Este es un mensaje";
print_f($aNotas);
?>