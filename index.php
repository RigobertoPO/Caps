<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
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
                <a class="nav-link" href="somos.php">¿Quiénes somos?</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacto.php">Contacto</a>
            </li> 
            <li class="nav-item" >
                <!-- <div class="btn-group-vertical">  
                    <label for="usuario">correo@gmail.com</label> 
                    <a style="color: red;text-decoration: none; " href="contacto.php">Cerrar sesión</a>                   
                </div>     -->
                <a class="nav-link" style="color: gray;" href="contacto.php">Iniciar sesión</a>  
            </li>           
        </ul>
        
        </nav>
        <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/image1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/image2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/image1.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="text-center">
                <button type="button" class="btn btn-secondary btn-lg">Large button</button>
        </div>
      
        </div>
    </header>
    <section>
        <div class="container">
        <?php
            include 'conexion.php';
            $conecta=new Conexion();
            $sql = "SELECT * FROM Productos"; 
            $query = $conecta -> prepare($sql); 
            $query -> execute(); 
            $results = $query -> fetchAll(PDO::FETCH_OBJ); 
            if($query -> rowCount() > 0)   { 
                foreach($results as $result) { 
                    ?>
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $result -> Modelo ?></h5>
                            <p class="card-text"><?php echo $result -> Nombre ?></p>
                            <a href="#" class="btn btn-primary">Comprar</a>
                        </div>
                        </div>
                    <?php             
                }
            }
        ?>
        </div>
    </section>
    <footer>

    </footer>
</body>
</html>