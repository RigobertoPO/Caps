<?php
class Usuario{    
    public function InsertarUsuario($nombre,$apellidoPaterno,$apellidoMaterno,$correo,$password,$tipo){
        include '../conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("INSERT INTO usuarios(Nombre,ApellidoPaterno,ApellidoMaterno,Correo, Password,TipoUsuario)
        VALUES(:nombre,:apellidoPaterno,:apellidoMaterno,:correo,:password,:tipo)");
         $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
         $consulta->bindParam(":apellidoPaterno",$apellidoPaterno,PDO::PARAM_STR);
         $consulta->bindParam(":apellidoMaterno",$apellidoMaterno,PDO::PARAM_STR);
         $consulta->bindParam(":correo",$correo,PDO::PARAM_STR);
         $consulta->bindParam(":password",$password,PDO::PARAM_STR);
         $consulta->bindParam(":tipo",$tipo,PDO::PARAM_INT);
         $consulta->execute();
        return true;
    }
    public function ModificarUsuario($id,$nombre,$apellidoPaterno,$apellidoMaterno){
        include '../conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("UPDATE usuarios SET Nombre=:nombre,
        ApellidoPaterno=:apellidoPaterno,ApellidoMaterno=:apellidoMaterno WHERE Id=:id");
        $consulta->bindParam(":id",$id,PDO::PARAM_STR);
        $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $consulta->bindParam(":apellidoPaterno",$apellidoPaterno,PDO::PARAM_STR);
        $consulta->bindParam(":apellidoMaterno",$apellidoMaterno,PDO::PARAM_STR);
        $consulta->execute();
        return 1;
    }
    public function EliminarUsuario($id){
        include '../conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("DELETE FROM usuarios WHERE Id=:id");
        $consulta->bindParam(":id",$id,PDO::PARAM_STR);
        $consulta->execute();
        return 1;
    }
    public function ObtenerUsuarios() //todos
    {
        include '../conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("SELECT * FROM Usuarios");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        return $consulta->fetchAll();
    }
    public function ObtenerUsuarioId($id) //un usuario
    {
        include '../conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("SELECT * FROM Usuarios WHERE Id=:id");
        $consulta->bindParam(":id",$id,PDO::PARAM_STR);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        return $consulta->fetchAll();
    }
    public function AutenticacionUsuario($correo,$password) //un usuario
    {
        include '../conexion.php';
        $conexion=new Conexion();
        $consulta=$conexion->prepare("SELECT * FROM Usuarios WHERE Correo=:correo AND Password=:password");
        $consulta->bindParam(":correo",$correo,PDO::PARAM_STR);
        $consulta->bindParam(":password",$password,PDO::PARAM_STR);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        return $consulta->fetchAll();
    }
}

?>