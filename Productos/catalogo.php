<?php
session_start();
if(isset($_SESSION['usuario']))
{
	$usuarioSesion=$_SESSION['usuario'];
	$tipoSesion=$_SESSION['tipo'];
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
    <script type="text/javascript">
			function editar_id(id){
				if(confirm('¿Desea modificar?'))
				{
					window.location.href='editarProducto.php?idEditar='+id;
				}
			}
			function eliminar_id(id){
				if(confirm('¿Desea eliminar?'))
				{
					window.location.href='eliminarProducto.php?idEliminar='+id;
				}
			}

		</script>
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
            <h1>Catálogo</h1>
            <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Modelo</th>
                <th scope="col">Precio</th>
                <th scope="col">Existencia</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../Modelos/Producto.php';
                    $producto = new Producto();
                    $resultado=$producto->ObtenerProductos();
                    if (count($resultado) > 0) {
                    foreach ($resultado as $registro) {
                        ?>
                            <tr>
                            <th scope="row"><?php echo $registro['Id'] ?></th>
                            <td><?php echo $registro['Nombre']?></td>
                            <td><?php echo $registro['Modelo'] ?></td>
                            <td><?php echo $registro['Precio'] ?></td>
                            <td><?php echo $registro['Existencia'] ?></td>
                            <td>
                                <a href="javascript:editar_id('<?php echo $registro["Id"];?>')"><img src="../img/Editar.png" alt=""> </a>
								<a href="javascript:eliminar_id('<?php echo $registro["Id"];?>')"><img src="../img/Cancelar.png" alt=""> </a>
                            </td>
                            </tr>
                        <?php
                    }
                    }
                ?>    
            </tbody>
            </table>                       
        </div>
    </section>
    <footer>

    </footer>
</body>
</html>