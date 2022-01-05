<?php
    $aProductos = array(
                    array("Smart TV 55'' 4K UHD","Hitachi","554KS20","Hay stock", 58000),
                    array("Samsung Galaxy A30","Samsung","Galaxy A30","No hay stock", 22000),
                    array("Aire Acondicionado Split Inverter Frio/Calor Surrey 2900F","Surrey","553AIQ201E","Hay stock", 45000),
                    );
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Listado Productos</title>
</head>
<body>
    <main>
    <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de Productos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-5">
                <table class="table border table-hover">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Acción</th>
                            
                        </tr>
                        <tr>
                            <td>
                                <?php echo $aProductos[0][0]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[0][1]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[0][2]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[0][3]; ?>
                            </td>
                            <td>
                                <?php echo "$ ".$aProductos[0][4]; ?>
                            </td>
                            <td>
                                <a href="" class="btn bg-primary text-light">Comprar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $aProductos[1][0]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[1][1]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[1][2]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[1][3]; ?>
                            </td>
                            <td>
                                <?php echo "$ ".$aProductos[1][4]; ?>
                            </td>
                            <td>
                                <a href="" class="btn bg-primary text-light">Comprar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $aProductos[2][0]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[2][1]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[2][2]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[2][3]; ?>
                            </td>
                            <td>
                                <?php echo "$ ".$aProductos[2][4]; ?>
                            </td>
                            <td>
                                <a href="" class="btn bg-primary text-light">Comprar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</body>
</html>