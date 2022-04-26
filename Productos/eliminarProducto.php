<?php
session_start();
if(isset($_SESSION['usuario']))
{
	$usuarioSesion=$_SESSION['usuario'];
	$tipoSesion=$_SESSION['tipo'];
	if($tipoSesion==2)
	{
		header("Location: ../index.php");
    }
    $id=$_GET['idEliminar'];
    include_once '../Modelos/Producto.php';
    $producto = new Producto();
    $resultado=$producto->EliminarProducto($id);
    if($resultado)
    {
        header("Location:catalogo.php");
    }
    else{
        header("Location:catalogo.php");
    }
}
else
{
	$usuarioSesion='';
	$tipoSesion='';
}
?>