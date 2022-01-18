<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $iva = 0;
    $resPrecioConIva = 0;
    $resPrecioSinIva = 0;
    $resIvaCantidad = 0;
    $mensaje = "";

    if($_POST){
        $iva = $_REQUEST["lstIva"];
        $resPrecioConIva = $_REQUEST["txtIva"];
        $resPrecioSinIva = $_REQUEST["txtSinIva"];

        if($resPrecioConIva != "" && $resPrecioSinIva == ""){
                $resPrecioSinIva = $resPrecioConIva/($iva/100+1);
                $resIvaCantidad = $resPrecioConIva - $resPrecioSinIva;
        } elseif($resPrecioConIva == "" && $resPrecioSinIva != ""){
                $resPrecioConIva = $resPrecioSinIva*($iva/100+1);
                $resIvaCantidad = $resPrecioConIva - $resPrecioSinIva;
        } elseif(($resPrecioConIva == "" && $resPrecioSinIva == "") || ($resPrecioConIva != "" && $resPrecioSinIva != "")){
            $resPrecioConIva = 0;
            $resPrecioSinIva = 0;
            $resIvaCantidad = 0;
            $mensaje = "Debes completar uno de los campos";
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
    <title>Calculadora de IVA</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 my-3">
                <h1>Calculadora de IVA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form method="POST" action="">
                    <div>
                    <label for="txtValorIva">IVA
                        <select name="lstIva" class="form-control">
                            <option value="27">27</option>
                            <option value="21">21</option>
                            <option value="10.5">10.5</option>
                        </select>
                    </label>
                    </div>
                    <div>
                        <label for="txtSinIva">Precio sin IVA:</label>
                        <input name="txtSinIva" id="txtSinIva" class="form-control">
                    </div>
                    <div>
                        <label for="txtIva">Precio con IVA:</label>
                        <input name="txtIva" id="txtIva" class="form-control">
                    </div>
                    <div>
                       <button type="submit" class="btn btn-primary my-3">Calcular</button>
                    </div>
                </form>
                <?php
                    if(isset($mensaje) && $mensaje != ""):{
                ?>
                        <div class="alert alert-danger" role="alert"><?php echo $mensaje; ?></div>
                <?php
                    }endif;
                ?>
            </div>
            <div class="col-4">
            <table class="table table-hover border mt-3">
                    <tr>
                        <th>IVA:</th>
                        <td>$<?php echo $iva; ?></td>
                    </tr>
                    <tr>
                        <th>Pecio sin IVA:</th>
                        <td>$<?php echo number_format(floatval($resPrecioSinIva),2,",","."); ?></td>
                    </tr>
                    <tr>
                        <th>Pecio con IVA:</th>
                        <td>$<?php echo number_format(floatval($resPrecioConIva),2,",","."); ?></td>
                    </tr>
                    <tr>
                        <th>IVA cantidad:</th>
                        <td>$<?php echo number_format(floatval($resIvaCantidad),2,",","."); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>