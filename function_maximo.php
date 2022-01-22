<?php
    $aNotas = array(8,4,5,3,9,1);
    $aSueldos = array(800.30,400.87,900.70,1800,500.45);

    function maximo($aVector){
        $maximo = 0;
        foreach ($aVector as $numero){
            if($numero > $maximo){
                $maximo = $numero;
            }
        }
        return $maximo;
    }

    echo "La nota maxima es: ".maximo($aNotas)."<br>";
    echo "El sueldo maximo es: ".maximo($aSueldos)."<br>";
?>