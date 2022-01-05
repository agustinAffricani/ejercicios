<?php
date_default_timezone_set('America/Argentina/Buenos_Aires'); //setea zona horaria de bs as - Argentina

$hr = date("H");
$min = date("i");
echo "La hora es: $hr:$min hs.<br>";

for($i=0;$i<60;$i++){
    $min++;
    if($min == 60){
        $min = 0;
        $hr++; 
        if($hr == 24){
                $hr = 0;
            }
    } 
    $date = date_create ("$hr:$min");
    $a = date_format ($date,"H:i");
    echo "La hora es: $a hs.<br>";
}
?>