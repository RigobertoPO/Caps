<?php
session_start();
if(isset($_SESSION['usuario']))
{
	$usuarioSesion=$_SESSION['usuario'];
	$tipoSesion=$_SESSION['tipo'];
    $idProduto=$_GET['id'];
    if(isset($_GET['id'])){
        require_once '../Modelos/Producto.php';
        $producto = new Producto();
        $resultado=$producto->ObtenerProductoId($idProduto);
        if (count($resultado) > 0) {
            foreach ($resultado as $registro) {
                $nombre=$registro['Nombre'];
                $modelo=$registro['Modelo'];
            }
        } else {
            header("Location: catalogo.php");
            exit();
        }
    }
}
else
{
	$usuarioSesion='';
	$tipoSesion='';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Gorras</title>
   
</head>
<body>
    <header>
        <nav >
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../somos.php">¿Quiénes somos?</a>
                </li>
                <?php
                if($usuarioSesion<>'' && $tipoSesion==2)
                {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../Carrito/carrito.php">Mi Carrito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Compras/compras.php">Mis Compras</a>
                    </li>
                    <?php
                }
                if($usuarioSesion<>'' && $tipoSesion==1)
                {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../Productos/catalogo.php">Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Pedidos/pedido.php">Pedidos</a>
                    </li>
                    <?php
                }
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="../contacto.php">Contacto</a>
                </li> 
                <li class="nav-item" >
                <?php
					if($usuarioSesion<>'')
					{
						?>
                        <div class="btn-group-vertical">  
                            <label for="usuario"><?php echo $usuarioSesion; ?></label> 
                            <a style="color: red;text-decoration: none; " href="logout.php">Cerrar sesión</a>                   
                        </div>    
						<?php
					}
                    else{
                        ?>
                            <a class="nav-link" style="color: gray;" href="login.php">Iniciar sesión</a>  
                        <?php
                    }
				?>  
                </li>           
            </ul>       
        </nav>      
    </header>
    <section>
        <div class="container">
            <h1><?php echo $nombre; ?></h1>
            <div class="card-body mt-3">  
            <form name="MiForm" id="MiForm" method="post" action="cargar.php" enctype="multipart/form-data">
               <div class="form-group mt-2">
                    <label>Id</label>
                    <input type="text" class="form-control text-center p-2" value="<?php echo $idProduto;?>"
                    placeholder="Nombre" name="nombre">
                </div>
                <h4 class="text-center">Seleccione imagen a cargar</h4>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Archivos</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="image" name="image" multiple>
                    </div>
                    <button name="submit" class="btn btn-primary">Cargar Imagen</button>
                </div>
            </form>     
        </div>                  
        </div>
    </section>
    <footer>

    </footer>
</body>
</html>