<?php
  $correo=$_POST['correo'];
  $password=$_POST['password'];
  require_once '../Modelos/Usuario.php';
  $usuario = new Usuario();
  $resultado=$usuario->AutenticacionUsuario($correo,$password);
  if (count($resultado) > 0) {
    foreach ($resultado as $registro) {
        session_start();
        $_SESSION['idUsuario']=$registro['Id'];
        $_SESSION['nombreUsuario']=$registro['Nombre'].' '.$registro['ApellidoPaterno'].' '.$registro['ApellidoMaterno'];
        $_SESSION['usuario']=$registro['Correo'];
        $_SESSION['tipo']=$registro['TipoUsuario'];
        header("Location: ../index.php");
    }
} else {
    header("Location: ../login.php");
    exit();
}
?>