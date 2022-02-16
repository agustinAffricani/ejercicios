<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("acceso.txt")){
    $strJson = file_get_contents("acceso.txt");
    $aAdmin = json_decode($strJson,true);
} else{
    $aAdmin [] = array(
        "usuario" => "admin",
        "clave" => "admin123"
    );
    $strJson = json_encode($aAdmin,true);
    file_put_contents("acceso.txt",$strJson);
    $strJson = file_get_contents("acceso.txt");
    $aAdmin = json_decode($strJson,true);
}

if($_POST){
    $usuario = $_POST["txtUsuario"];
    $clave = $_POST["txtClave"];
    foreach($aAdmin as $admin){
        if(($usuario && $clave != "") && ($usuario == $admin["usuario"] && $clave == $admin["clave"])){
            header("Location: abm.php");
        } else{
            $mensaje = "Nombre de usuario o contraseña incorrectos.";
        }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="timeout.js"></script>
    <title>Ingreso ABM Clientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Ingreso ABM Clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4 mt-5 offset-md-4 offset-3">
                <form method="POST" action="">
                    <div>
                        <label for="txtUsuario">Usuario:</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" required>
                    </div>
                    <div>
                        <label for="txtClave">Clave:</label>
                        <input name="txtClave" id="txtClave" type="password" class="form-control" required>
                    </div>
                    <div>
                       <button type="submit" class="btn btn-primary my-3">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <?php if(isset($mensaje)){?>
                <div class="col-md-4 offset-md-4 col-12">
                    <div class="alert alert-danger">
                        <?php 
                            echo $mensaje;
                        }
                        ?> 
                    </div>
                </div>    
        </div>
    </main>
</body>
</html>