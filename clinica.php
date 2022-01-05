<?php
    $aPacientes = array();
    $aPacientes[] = array(
        "dni" => "33.765.012",
        "nombre" => "Ana Acuña",
        "edad" => 45,
        "peso" => 81.50
    );
    $aPacientes[] = array(
        "dni" => "23.684.385",
        "nombre" => "Gonzalo Bustamante",
        "edad" => 66,
        "peso" => 79
    );
    $aPacientes[] = array(
        "dni" => "32.345.678",
        "nombre" => "Juan Irraola",
        "edad" => 35,
        "peso" => 88
    );
    $aPacientes[] = array(
        "dni" => "18.785.699",
        "nombre" => "Beatriz Ocampo",
        "edad" => 55,
        "peso" => 68
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Clinica</title>
</head>
<body>
    <main>
    <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de pacientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-5">
                <table class="table border table-hover">
                    <tr>
                        <th>DNI:</th>
                        <th>Nombre y Apellido:</th>
                        <th>Edad:</th>
                        <th>Peso:</th>
                    </tr>
                    <?php
                    foreach($aPacientes as $paciente){
                     echo "<tr>";
                     echo "<td>" . $paciente["dni"] . "</td>";
                     echo "<td>" . $paciente["nombre"] . "</td>";
                     echo "<td>" . $paciente["edad"]. "</td>";
                     echo "<td>" . $paciente["peso"]. "</td>";
                     echo "</tr>";
                    }
                    ?>
                </table>
    </main>
    
</body>
</html>