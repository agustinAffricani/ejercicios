<?php
    $aNotas = array(8,4,5,3,9,1);

    function promediar($aNumeros){
        $numero = 0;
        $promedio = 0;
        $suma = 0;
        foreach ($aNumeros as $numero){
            $suma = $suma+$numero;
        }
        $promedio = $suma/(count($aNumeros));
        return $promedio;
    }

    echo "El Promedio es: ".promediar($aNotas)."<br>";
?>