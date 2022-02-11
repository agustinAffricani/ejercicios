<?php
class Persona{
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function imprimir(){

    }

    public function setDni ($dni){
        $this->dni = $dni;
    }
    public function setNombre ($nombre){
        $this->nombre = $nombre;
    }
    public function setEdad ($edad){
        $this->edad = $edad;
    }
    public function setNacionalidad ($nacionalidad){
        $this->nacionalidad = $nacionalidad;
    }

    public function getDni(){
        return $this->dni;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function getNacionalidad(){
        return $this->nacionalidad;
    }
}

class Alumno extends Persona{
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;
    //cuando se quiere inicializar las variables se llama al constructor
    public function __construct(){
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function calcularPromedio(){
        $promedio = ($this->notaPortfolio + $this->notaProyecto + $this->notaPhp)/3;
        return $promedio;
    }

    public function imprimir(){
        echo "Alumno:  " . $this->nombre . "<br>";
        echo "Documento:  " . $this->dni . "<br>";
        echo "Edad:  " . $this->edad . "<br>";
        echo "Nacionalidad:  " . $this->nacionalidad . "<br>";
        echo "Nota del portfolio:  " . $this->notaPortfolio . "<br>";
        echo "Nota PHP:  " . $this->notaPhp . "<br>";
        echo "Nota Proyecto:  " . $this->notaProyecto . "<br>";
        echo "Promedio:  " . $this->calcularPromedio() . "<br><br>";
    }

}

class Docente extends Persona{
    private $especialidad;
    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Base de Datos";

    public function __construct($dni, $nombre, $especialidad){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->especialidad = $especialidad;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimirEspecialidadesHabilitadas(){
        echo "Las especialidades habiliadas son: <br>";
        echo self::ESPECIALIDAD_BBDD."<br>";
        echo self::ESPECIALIDAD_ECO."<br>";
        echo self::ESPECIALIDAD_WP."<br>";
    }

    public function imprimir(){
        echo "Docente:  " . $this->nombre . "<br>";
        echo "Documento:  " . $this->dni . "<br>";
        echo "Edad:  " . $this->edad . "<br>";
        echo "Nacionalidad:  " . $this->nacionalidad . "<br>";
        echo "Especilidad: " . $this->especialidad . "<br>";
    }


}

$alumno1 = new Alumno();
$alumno1->setDni("3698575");
$alumno1->setNombre("Ana Valle");
$alumno1->setEdad(30);
$alumno1->setNacionalidad("Argentino");
$alumno1->legajo = 13775;
$alumno1->notaPhp = 9.5;
$alumno1->notaPortfolio = 7;
$alumno1->notaProyecto = 8.5;
$alumno1->imprimir();

$docente = new Docente("25789410","Juan Perez",Docente::ESPECIALIDAD_ECO);
$docente->imprimir();
?>