<?php
$nombre=$_POST['nombre'];
$modelo=$_POST['modelo'];
$precio=$_POST['precio'];
$existencia=$_POST['existencia'];
$tipoProducto=$_POST['tipoProducto'];
if(!empty($nombre)&& !empty($modelo)&& !empty($precio) && !empty($existencia) && !empty($tipoProducto)){
    require_once '../Modelos/producto.php';
    $producto = new Producto();
    $resultado=$producto->InsertarProducto($nombre,$modelo,$precio,$existencia,$tipoProducto);
    if($resultado)
    {
        header("Location:catalogo.php");
    }
    else{
        header("Location:agregarProducto.php");
    }
}
else{
    
    header("Location:agregarProducto.php");
}
?>