<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if($_POST){
        $usuario = $_POST["txtUsuario"];
        $clave = $_POST["txtClave"];
        if($usuario && $clave != ""){
            header("Location: acceso_confirmado.php");
        } else{
            $mensaje = "Valido para Usuarios Registrados";
        }
    }
    //print_r($mensaje);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Formulario</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-4">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form method="POST" action="">
                    <div>
                        <label for="txtUsuario">Usuario:</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control">
                    </div>
                    <div>
                        <label for="txtClave">Clave:</label>
                        <input name="txtClave" id="txtClave" type="password" class="form-control">
                    </div>
                    <div>
                       <button type="submit" class="btn btn-primary my-3">ENVIAR</button>
                    </div>
                </form>
            </div>
                <?php
                    if(isset($mensaje)):{
                ?>
                        <div class="alert alert-danger" role="alert"><?php echo $mensaje; ?></div>
                <?php
                    }endif;
                ?>
            </div>
        </div>
    </main>
</body>
</html>