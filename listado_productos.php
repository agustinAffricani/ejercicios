<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  $aProductos = array();
  $aProductos[] = array("nombre" => "Smart TV 55\" 4K UHD",
                     "marca" => "Hitachi",
                     "modelo" => "554KS20",
                     "stock" => 60,
                     "precio" => 58000
  );
  $aProductos[] = array("nombre" => "Samsung Galaxy A30 Blanco",
                     "marca" => "Samsung",
                     "modelo" => "Galaxy A30",
                     "stock" => 0,
                     "precio" => 22000
  );
  $aProductos[] = array("nombre" => "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F",
                     "marca" => "Surrey",
                     "modelo" => "553AIQ1201E",
                     "stock" => 5,
                     "precio" => 45000
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
                                <?php echo $aProductos[0]["nombre"]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[0]["marca"]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[0]["modelo"]; ?>
                            </td>
                            <td>
                                <?php
                                echo $aProductos[0]["stock"]>10? "Hay Stock":($aProductos[0]["stock"]<=10 && $aProductos[0]["stock"]>0?"Hay poco Stock":"No hay Stock");
                                    /*if($aProductos[0]["stock"] == 0){
                                        echo "No hay Stock";
                                    } else if($aProductos[0]["stock"] <= 10) {
                                        echo "Hay poco Stock";
                                    } else if($aProductos[0]["stock"] > 10)
                                        {
                                            echo "Hay Stock";
                                        }*/
                                ?>
                            </td>
                            <td>
                                <?php echo "$ ".$aProductos[0]["precio"]; ?>
                            </td>
                            <td>
                                <a href="" class="btn bg-primary text-light">Comprar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $aProductos[1]["nombre"]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[1]["marca"]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[1]["modelo"]; ?>
                            </td>
                            <td>
                                <?php
                                    if($aProductos[1]["stock"] == 0){
                                        echo "No hay Stock";
                                    } else if($aProductos[1]["stock"] <= 10) {
                                        echo "Hay poco Stock";
                                    } else if($aProductos[1]["stock"] > 10)
                                        {
                                            echo "Hay Stock";
                                        }
                                ?>
                            </td>
                            <td>
                                <?php echo "$ ".$aProductos[1]["precio"]; ?>
                            </td>
                            <td>
                                <a href="" class="btn bg-primary text-light">Comprar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $aProductos[2]["nombre"]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[2]["marca"]; ?>
                            </td>
                            <td>
                                <?php echo $aProductos[2]["modelo"]; ?>
                            </td>
                            <td>
                                <?php
                                    if($aProductos[2]["stock"] == 0){
                                        echo "No hay Stock";
                                    } else if($aProductos[2]["stock"] <= 10) {
                                        echo "Hay poco Stock";
                                    } else if($aProductos[2]["stock"] > 10)
                                        {
                                            echo "Hay Stock";
                                        }
                                ?>
                            </td>
                            <td>
                                <?php echo "$ ".$aProductos[2]["precio"]; ?>
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