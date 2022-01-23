<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definición de array de alumnos
$aAlumnos = array();
$aAlumnos[] = array("nombre" => "Juan Perez", "nota1" => 9, "nota2" => 8);
$aAlumnos[] = array("nombre" => "Ana Valle", "nota1" => 4, "nota2" => 9);
$aAlumnos[] = array("nombre" => "Gonzalo Roldán", "nota1" => 7, "nota2" => 6);

//Funcion promediar
function promediar($aCurso, $j){
    $promedio = ($aCurso[$j]["nota1"] + $aCurso[$j]["nota2"])/2;
    return $promedio;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Actas</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 my-3 text-center">
                <h1>Actas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Alumno</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $promedios = 0;
                        $sum = 0;
                        for ($i=0;$i<count($aAlumnos);$i++){
                            $promedios += promediar($aAlumnos,$i);
                            $sum++;
                    ?>
                        <tr>
                            <td><?php echo $i+1; ?></td>
                            <td><?php echo $aAlumnos[$i]["nombre"]; ?></td>
                            <td><?php echo $aAlumnos[$i]["nota1"]; ?></td>
                            <td><?php echo $aAlumnos[$i]["nota2"]; ?></td>
                            <td><?php echo promediar($aAlumnos,$i); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <h5>Promedio de la cursada: <?php echo number_format($promedios / $sum, 2, ",", "."); ?></h5>
            </div>
        </div>
    </main>
</body>
</html>