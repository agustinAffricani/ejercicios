<?php
    $aNotas = array(8,4,5,3,9,1);

    function promediar($aNumeros){
        $suma = 0;
        foreach ($aNumeros as $numero){
            $suma = $suma+$numero;
        }
        return $suma/(count($aNumeros));
    }

    echo "El Promedio es: ".promediar($aNotas)."<br>";
?>