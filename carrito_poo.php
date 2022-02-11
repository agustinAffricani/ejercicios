<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Cliente{
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;

    public function __construct(){
        $this->descuento = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir(){
        echo "Cliente:  " . $this->nombre . "<br>";
        echo "Documento:  " . $this->dni . "<br>";
        echo "Correo:  " . $this->correo . "<br>";
        echo "Telefono:  " . $this->telefono . "<br>";
        echo "Descuento:  " . $this->descuento . "<br>";
    }
}

class Producto{
    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;

    public function __construct(){
        $this->precio = 0.0;
        $this->iva = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir(){
        echo "Producto:  " . $this->nombre . "<br>";
        echo "Codigo:  " . $this->cod . "<br>";
        echo "Precio:  " . $this->precio . "<br>";
        echo "Descripcion:  " . $this->descripcion . "<br>";
        echo "IVA:  " . $this->iva . "<br>";
    }
}

class Carrito{
    private $cliente;
    private $aProductos;
    private $subTotal;
    private $total;

    public function __construct(){
        $this->subtotal = 0.0;
        $this->total = 0.0;
        $this->aProductos = array();
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function cargarCarrito($producto){
        $this->aProductos[] = $producto;
    }

    public function imprimirTicket(){
        echo '<table class="table table-hover border mt-3">';
        echo '<tr><th colspan="2" class="text-center">ECO MARKET</th></tr>';
        echo '<tr><th>Fecha</th>';
        echo '<td>'.date("d/m/Y H:i:s").'</td>';
        echo '</tr>';
        echo '<tr><th>Nombre</th>';
        echo '<td>'.$this->cliente->nombre.'</td>';
        echo '</tr>';
        echo '<tr><th>DNI</th>';
        echo '<td>'.$this->cliente->dni.'</td>';
        echo '</tr>';
        echo '<tr><th colspan="2">Productos:</th>';
        echo '</tr>';
        echo '</tr>';
       
        foreach($this->aProductos as $producto){
            echo '<tr>';
            echo '<td>'.$producto->nombre.'</td>';
            echo '<td>'.'$'.number_format($producto->precio,2,",",".").'</td>';
            echo '</tr>';
            $this->subTotal += $producto->precio;
            $this->total += $producto->precio * (($producto->iva / 100)+1);
        }
        echo '<tr><th>Subtotal s/IVA:</th>';
        echo '<td>'.'$'.number_format($this->subTotal,2,",",".").'</td>';
        echo '</tr>';
        echo '<tr><th>TOTAL:</th>';
        echo '<td>'.'$'.number_format($this->total,2,",",".").'</td>';
        echo '</tr>';
        echo '</table>';
    }
}

$cliente1 = new Cliente();
$cliente1->dni = "41023857";
$cliente1->nombre = "Bernabé";
$cliente1->correo = "bernabe@gmail.com";
$cliente1->telefono = "+5411558866998";
$cliente1->descuento = 0.05;
//$cliente1->imprimir();

$producto1 = new Producto();
$producto1->cod = "AB456465";
$producto1->nombre = "Notebook 15'' HP ";
$producto1->descripcion = "Heladera no froze";
$producto1->precio = 76000;
$producto1->iva = 10.5;
//$producto1->imprimir();

$producto2 = new Producto();
$producto2->cod = "WH26JKJ2";
$producto2->nombre = "Heladera Whirpool";
$producto2->descripcion = "Computadora HP";
$producto2->precio = 30800;
$producto2->iva = 21;
//$producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarCarrito($producto1);
$carrito->cargarCarrito($producto2);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Carrito de Compras</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-4">
                <?php $carrito->imprimirTicket();?>
            </div>    
        </div>  
    </main>
</body>
</html>