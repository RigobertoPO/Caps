<?php
require_once '../Conexion.php';
class Producto {
    private $id;
    private $nombre;
    private $modelo;
    private $precio;
    private $existencia;
    private $idTipoProducto;
    private $Imagen;

    const TABLA = 'productos';
    //GET----
    public function getId() {
        return $this->Id;
     }
     public function getNombre() {
        return $this->Nombre;
     }
     public function getModelo() {
        return $this->Modelo;
     }
     public function getPrecio() {
        return $this->Precio;
     }
     public function getExistencia() {
        return $this->Existencia;
     }
     public function getIdTipoProducto() {
        return $this->IdTipoProducto;
     }
     public function getImagen() {
        return $this->Imagen;
     }
     //SET--------
     public function setNombre($nombre) {
        $this->Nombre = $nombre;
     }
     public function setModelo($modelo) {
        $this->Modelo = $modelo;
     }
     public function setPrecio($precio) {
        $this->Precio = $precio;
     }
     public function setExistencia($existencia) {
        $this->Existencia = $existencia;
     }
     public function setIdTipoProducto($idTipoProducto) {
        $this->IdTipoProducto = $idTipoProducto;
     }
     public function setImagen($imagen) {
        $this->Imagen = $imagen;
     }

     public function __construct($nombre, $modelo, $precio, $existencia,$idTipoProducto,$imagen, $id=null) {
        $this->Nombre = $nombre;
        $this->Modelo = $modelo;
        $this->Precio = $precio;
        $this->Existencia = $existencia;
        $this->IdTipoProducto = $idTipoProducto;
        $this->Imagen = $imagen;
     }
}
?>