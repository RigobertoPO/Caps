<?php
$nombre=$_POST['nombre'];
$paterno=$_POST['paterno'];
$materno=$_POST['materno'];
$correo=$_POST['correo'];
$password=$_POST['password'];
if(!empty($nombre)&& !empty($paterno)&& !empty($materno) && !empty($correo) && !empty($password)){
    require_once '../Modelos/Usuario.php';
    $usuario = new Usuario();
    $resultado=$usuario->InsertarUsuario($nombre,$paterno,$materno,$correo,$password,2);
    if($resultado)
    {
        header("Location:../login.php");
    }
    else{
        header("Location:../registrar.php");
    }
}
else{
    
    header("Location:../registrar.php");
}
?>