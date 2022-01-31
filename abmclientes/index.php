<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("archivo.txt")){
    //si el archivo existe lo abre y luego lo convierte en un array asosiativo para poder trabajarlo
    $strJson = file_get_contents("archivo.txt");
    $aClientes = json_decode($strJson,true);
} else{
    //si no existe crea array vacio
    $aClientes = array();
}

$id = isset($_GET["id"])? $_GET["id"]:"";

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

    if($id >= 0){
        $aClientes[$id] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $imagen
        );
    } else{
        $aClientes[] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $imagen 
        );
    }
        //convertir el array asosiativo en json para poder guardar en un archivo
        $strJson = json_encode($aClientes);
        //almacenar archivo.txt
        file_put_contents("archivo.txt",$strJson);
    }

    if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
        if(file_exists("imagenes/".$aClientes[$id]["imagen"])){
            unlink("imagenes/".$aClientes[$id]["imagen"]);
        }
        unset($aClientes[$id]);
        $strJson = json_encode($aClientes,true);
        file_put_contents("archivo.txt",$strJson);
        header("location:index.php");
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
    <title>ABM Clientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Registro de Clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="">DNI:*</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" require value="<?php echo isset($aClientes[$id]["dni"])? $aClientes[$id]["dni"]:"";?>">
                    </div>
                    <div>
                        <label for="">Nombre:*</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" require value="<?php echo isset($aClientes[$id]["nombre"])? $aClientes[$id]["nombre"]:"";?>">
                    </div>
                    <div>
                        <label for="">Telefono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo isset($aClientes[$id]["telefono"])? $aClientes[$id]["telefono"]:"";?>">
                    </div>
                    <div>
                        <label for="">Correo:*</label>
                        <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" require value="<?php echo isset($aClientes[$id]["correo"])? $aClientes[$id]["correo"]:"";?>">
                    </div>
                    <div class="mt-3">
                        <label for="">Archivo Adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos: .jpg, .jpeg, .png</small>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <a href="index.php" class="btn btn-danger">
                            Nuevo
                        </a>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border">
                    <tr>
                        <th>Imagen</th>
                        <th>Dni</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach($aClientes as $pos => $cliente): ?>
                        <tr>
                            <td><img src="imagenes/<?php echo $cliente["imagen"];?>" alt="" class="img-thumbnail"></td>
                            <td><?php echo $cliente["dni"];?></td>
                            <td><?php echo $cliente["nombre"];?></td>
                            <td><?php echo $cliente["correo"];?></td>
                            <td> 
                                <a href="?id=<?php echo $pos; ?>"><i class="fas fa-edit"></i></a>
                                <a href="?id=<?php echo $pos; ?>&do=eliminar"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>