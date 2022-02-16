<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$id = isset($_GET["id"])? $_GET["id"]:"";

if(!isset($_SESSION["alerta"])){
    $_SESSION["alerta"]= "";
}

if(file_exists("archivo.txt")){
    //si el archivo existe lo abre y luego lo convierte en un array asosiativo para poder trabajarlo
    $strJson = file_get_contents("archivo.txt");
    $aClientes = json_decode($strJson,true);
} else{
    //si no existe crea array vacio
    $aClientes = array();
}

if($_POST){ //funcion trim elimina espacion colocados por el usuario en los formularios
    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);

    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
        if(isset($aClientes[$id]["imagen"]) && $aClientes[$id]["imagen"] != ""){
            unlink("imagenes/".$aClientes[$id]["imagen"]);
        }
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $nombreArchivo = $_FILES["archivo"]["name"];
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $imagen = "$nombreAleatorio.$extension";
        move_uploaded_file($archivo_tmp, "imagenes/$imagen");
    } else {
        if($id >= 0){
            $imagen = $aClientes[$id]["imagen"];
        } else{
            $imagen = "";
        }
    }
    //modifica un cliente
    if($id >= 0){
        $aClientes[$id] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $imagen
        );
        $_SESSION ["alerta"] = "Cliente modificado correctamente.";
        header("Location: abm.php");
        
    //agrega un cliente nuevo
    } else{
        $aClientes[] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $imagen 
        );
        $_SESSION ["alerta"] = "Cliente agregado correctamente.";
    }
        //convertir el array asosiativo en json para poder guardar en un archivo
        $strJson = json_encode($aClientes);
        //almacenar archivo.txt
        file_put_contents("archivo.txt",$strJson);
}

//eliminar cliente
if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    if(file_exists("abmclientes/imagenes/".$aClientes[$id]["imagen"])){
        unlink("abmclientes/imagenes/".$aClientes[$id]["imagen"]);
    }   
    unset($aClientes[$id]);
    $strJson = json_encode($aClientes,true);
    file_put_contents("archivo.txt",$strJson);
    $_SESSION ["alerta"] = "Cliente eliminado correctamente.";
    header("Location: abm.php");
}

function alerta(){
    $link =  $_SERVER["REQUEST_URI"];
    if($_SESSION["alerta"]!="" && $link == "/php/abmclientes/abm.php"){   
        echo ' <div class="col-md-4 col-12">';
        echo '<div class="alert alert-success">';
        echo $_SESSION["alerta"];
        session_destroy();           
        echo '</div>';
        echo '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="timeout.js"></script>
  
    <title>ABM Clientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Registro de Clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="">DNI:*</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required value="<?php echo isset($aClientes[$id]["dni"])? $aClientes[$id]["dni"]:"";?>">
                    </div>
                    <div>
                        <label for="">Nombre:*</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo isset($aClientes[$id]["nombre"])? $aClientes[$id]["nombre"]:"";?>">
                    </div>
                    <div>
                        <label for="">Telefono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo isset($aClientes[$id]["telefono"])? $aClientes[$id]["telefono"]:"";?>">
                    </div>
                    <div>
                        <label for="">Correo:*</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($aClientes[$id]["correo"])? $aClientes[$id]["correo"]:"";?>">
                    </div>
                    <div class="mt-3">
                        <label for="">Archivo Adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
                    </div>
                    <div class="row my-3">
                        <div class="col-3 col-md-2 mx-1">
                            <button type="submit" class="btn btn-success btn-lg boton">
                                Guardar
                            </button>
                        </div>
                        <div class="col-3 col-md-2 mx-1">
                            <a href="abm.php" class="btn btn-primary btn-lg boton">Nuevo</a>
                        </div>
                        <div  class="col-3 col-md-2 mx-1 boton">
                            <a href="index.php" class="btn btn-danger btn-lg boton">Salir</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 px-md-3 px-0 mx-ms-0 mx-0">
                <table class="table table-hover border text-center">
                    <tr>
                        <th>Imagen</th>
                        <th>Dni</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach($aClientes as $pos => $cliente): ?>
                        <tr>
                            <td><img src="imagenes/<?php echo $cliente["imagen"];?>" alt="" class="img-thumbnail"></td>
                            <td><?php echo $cliente["dni"];?></td>
                            <td><?php echo $cliente["nombre"];?></td>
                            <td><?php echo $cliente["telefono"];?></td>
                            <td><?php echo $cliente["correo"];?></td>
                            <td> 
                                <a href="?id=<?php echo $pos; ?>"><i class="fas fa-edit btn btn-primary p-1"></i></a>
                                <a href="?id=<?php echo $pos; ?>&do=eliminar" onclick=""><i class="fas fa-trash-alt btn btn-danger p-1"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
            <div class="row">   
                <?php 
                    alerta();
                ?> 
            </div>    
    </main>
</body>
</html>