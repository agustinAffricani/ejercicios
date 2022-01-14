<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $aPacientes = array();
    $aEmpleados[] = array(
        "dni" => 33300123,
        "nombre" => "David Garcia",
        "sueldo" => 85000.30
    );
    $aEmpleados[] = array(
        "dni" => 40874456,
        "nombre" => "Ana Del Valle",
        "sueldo" => 90000
    );
    $aEmpleados[] = array(
        "dni" => 67567565,
        "nombre" => "Andres Perez",
        "sueldo" => 100000
    );
    $aEmpleados[] = array(
        "dni" => 75744545,
        "nombre" => "Victoria Luz",
        "sueldo" => 70000
    );
    
    function calcularNeto($sueldo){
        return $neto = $sueldo - $sueldo*0.17;
    }

    function cantidadEmpleados ($empleados){
        $count = 0;
        foreach ($empleados as $empleado){
            $count++;
        }
        return $count;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Empleados</title>
</head>
<body>
    <main>
        <div class="row">
                <div class="col-12 text-center py-5">
                    <h1>Listado de Empleados</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-5">
                    <table class="table border table-hover">
                        <tr>
                            <th>DNI:</th>
                            <th>Nombre y Apellido:</th>
                            <th>Sueldo:</th>
                        </tr>
                        <?php
                        foreach($aEmpleados as $empleado){
                        echo "<tr>";
                        echo "<td>" . number_format($empleado["dni"], 0, ",", ".") . "</td>";
                        echo "<td>" . strtoupper($empleado["nombre"]) . "</td>";
                        echo "<td>" . "$" . number_format(calcularNeto($empleado["sueldo"]), 2, ",", ".") . "</td>";
                        echo "</tr>";
                        }
                        ?>
                    </table>
                    <?php echo "Cantidad de Empleados activos: " . cantidadEmpleados($aEmpleados); ?>
                </div>
        </div>
    </main>
    
</body>
</html>