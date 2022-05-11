<?php
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

   //   public function __construct($nombre, $modelo, $precio, $existencia,$idTipoProducto,$imagen, $id=null) {
   //      $this->Nombre = $nombre;
   //      $this->Modelo = $modelo;
   //      $this->Precio = $precio;
   //      $this->Existencia = $existencia;
   //      $this->IdTipoProducto = $idTipoProducto;
   //      $this->Imagen = $imagen;
   //   }
   public function ObtenerProductos() //un usuario
    {
        include '../conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("SELECT * FROM Productos");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        return $consulta->fetchAll();
    }
    public function ObtenerProductoId($id) //un usuario
    {
        include_once '../conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("SELECT * FROM Productos WHERE Id=:id");
        $consulta->bindParam(":id",$id,PDO::PARAM_STR);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $conexion = null; // obligado para cerrar la conexión
     
        return $consulta->fetchAll();
    }
    public function EliminarProducto($id) //un usuario
    {
        include '../conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("DELETE FROM Productos WHERE Id=:id");
        $consulta->bindParam(":id",$id,PDO::PARAM_STR);
        $consulta->execute();
        return true;
    }
    public function InsertarProducto($nombre,$modelo,$precio,$existencia,$tipoProducto){
      include '../conexion.php';
      $conexion=new Conexion();
      $consulta=$conexion->prepare("INSERT INTO productos(Nombre,Modelo,Precio,Existencia, IdTipoProducto,Imagen)
      VALUES(:nombre,:modelo,:precio,:existencia,:tipoProducto,'')");
       $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
       $consulta->bindParam(":modelo",$modelo,PDO::PARAM_STR);
       $consulta->bindParam(":precio",$precio,PDO::PARAM_STR);
       $consulta->bindParam(":existencia",$existencia,PDO::PARAM_STR);
       $consulta->bindParam(":tipoProducto",$tipoProducto,PDO::PARAM_INT);
       $consulta->execute();
      return true;
    }
    public function ModificarProducto($id,$nombre,$modelo,$precio,$existencia,$tipoProducto){
      include '../conexion.php';
      $conexion=new Conexion();

      $consulta=$conexion->prepare("UPDATE productos SET Nombre=:nombre,Modelo=:modelo,Precio=:precio,Existencia=:existencia,IdTipoProducto=:tipoProducto
                 WHERE Id=:id"); //: asociacion
      $consulta->bindParam(":id",$id,PDO::PARAM_STR);
      $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
      $consulta->bindParam(":modelo",$modelo,PDO::PARAM_STR);
      $consulta->bindParam(":precio",$precio,PDO::PARAM_STR);
      $consulta->bindParam(":existencia",$existencia,PDO::PARAM_STR);
      $consulta->bindParam(":tipoProducto",$tipoProducto,PDO::PARAM_INT);
      $consulta->execute();   
      return true;
    }
    public function ObtenerTiposProductos() //un usuario
    {
        include_once '../conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("SELECT * FROM TiposProductos");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        return $consulta->fetchAll();
    }
    public function ModificarImagen($id,$nombreImagen){
      include '../conexion.php';
      $conexion=new Conexion();

      $consulta=$conexion->prepare("UPDATE productos SET Imagen=:nombreImagen
                 WHERE Id=:id"); //: asociacion
      $consulta->bindParam(":id",$id,PDO::PARAM_STR);
      $consulta->bindParam(":nombreImagen",$nombreImagen,PDO::PARAM_STR);
      $consulta->execute();   
      return true;
    }
}
?>