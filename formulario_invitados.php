<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//$aInvitados = array("pepe", "ana", "maca", "juan");
//Lista de invitados admitidos
if(file_exists("invitados.txt")){
    $aInvitados = explode(",",file_get_contents("invitados.txt"));
} else {
    $aInvitados = array();
}

if($_POST){
    if(isset($_POST["btnNombre"])){ //si apreto el boton para verificar el nombre
        $nombre = $_POST["txtNombre"];
        if(in_array($nombre,$aInvitados)){
            $aMensaje = array("texto" => "Bienvenid@ a la fiesta!",
                        "estado" => "success");
        } else{
            $aMensaje = array("texto" => "No se encuentra en la lista de invitados.", 
                                "estado" => "danger");
        }
    } elseif(isset($_POST["btnCodigo"])){ //si apreto el boton para verificar el codigo vip que es "verde"
        $codigo = $_POST["txtVip"];
        if ($codigo == "verde") {
            $aMensaje = array("texto" => "Su código de acceso es " . rand(1000,9999), 
                                "estado" => "success");
        } else {
            $aMensaje = array("texto" => "Ud. no tiene pase VIP", 
                                "estado" => "danger");
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
    <title>Lista Invitados</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-6 my-3">
                <h1>Listado de Invitados</h1>
                <h6>Complete el siguiente formulario:</h6>
            </div>
            <div>
                <?php if(isset($aMensaje)): ?>
                <div class="col-12">
                <div class="alert alert-<?php echo $aMensaje["estado"]; ?>" role="alert">
                <?php echo $aMensaje["texto"]; ?>
            </div>
        </div>
        <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST">
                    <div>
                        <label for="">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                        <input type="submit" value="Verificar Nombre" name="btnNombre" class="btn btn-primary">
                    </div>
                    <div>
                        <label for="">Ingrese el codigo secreto para el pase VIP:</label>
                        <input type="text" name="txtVip" id="txtVip" class="form-control">
                        <input type="submit" value="Verificar Codigo" name="btnCodigo" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>