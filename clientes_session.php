<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    if(!isset($_SESSION["listado"])){
        $_SESSION["listado"]= array();
    }
    if($_POST){
        $nombre = $_REQUEST["txtNombre"];
        $dni = $_REQUEST["txtDni"];
        $telefono = $_REQUEST["txtTelefono"];
        $edad = $_REQUEST["txtEdad"];
        if(isset($_POST["btnAgregar"])){
            $_SESSION ["listado"] []= array(
                "nombre" => $nombre,
                "dni" => $dni,
                "tel" => $telefono,
                "edad" => $edad
            );
        }
        if(isset($_POST["btnEliminar"])){
            session_destroy();
            $_SESSION["listado"] = array();
        }
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Listado Clientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-6 my-3 text-center">
                <h1>Listado Clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form method="POST" action="">
                    <div>
                        <label for="txtNombre" class="mt-2">Nombre:</label>
                        <input name="txtNombre" id="txtNombre" class="form-control" >
                    </div>
                    <div>
                        <label for="txtDni" class="mt-2">DNI:</label>
                        <input name="txtDni" id="txtDni" class="form-control" >
                    </div>
                    <div>
                        <label for="txtTelefono" class="mt-2">Telefono:</label>
                        <input name="txtTelefono" id="txtTelefono" class="form-control" >
                    </div>
                    <div>
                        <label for="txtEdad" class="mt-2">Edad:</label>
                        <input name="txtEdad" id="txtEdad" class="form-control" >
                    </div>
                    <div class="mt-3">
                    <input type="submit" name="btnAgregar" class="btn bg-primary text-white" value="Enviar">
                    <input type="submit" name="btnEliminar" class="btn bg-danger text-white float-end" value="Eliminar">                       
                    </div>
                </form>
                <?php
                 
                ?>
            </div>
            <div class="col-6">
            <table class="table border table-hover">
                <tr>
                    <th>Nombre:</th>
                    <th>DNI:</th>
                    <th>Telefono:</th>
                    <th>Edad:</th>
                </tr>
                    <?php
                        foreach($_SESSION["listado"] as $lista){
                            echo "<tr>";
                            echo "<td>" . $lista["nombre"] . "</td>";
                            echo "<td>" . $lista["dni"] . "</td>";
                            echo "<td>" . $lista["tel"] . "</td>";
                            echo "<td>" . $lista["edad"] . "</td>";
                            echo "</tr>";
                        }
                    ?>
            </table>
            </div>
        </div>
    </main>
</body>
</html>