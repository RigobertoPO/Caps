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
                    <a class="nav-link" style="color: gray;" href="login.php">Iniciar sesión</a>  
                </li>           
            </ul>       
        </nav>
    </header>
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center" id="template-bg-3">
        <div class="card mb-5 p-5 bg-gradient bg-gradient text-dark col-md-4">
        <div class="card-header text-center">
        <h3>Iniciar sesión </h3>
        </div>
        <div class="card-body mt-3">
        <form name="login" action="" method="post">
            <div class="form-group mt-2">
                <label>Nombre</label>
                <input type="text" class="form-control text-center p-2"
                placeholder="Usuario" name="username">
            </div>
            <div class="form-group mt-2">
                <label>Apellido paterno</label>
                <input type="text" class="form-control text-center p-2"
                placeholder="Usuario" name="username">
            </div>
            <div class="form-group mt-2">
                <label>Apellido materno</label>
                <input type="text" class="form-control text-center p-2"
                placeholder="Usuario" name="username">
            </div>
            <div class="form-group mt-2">
                <label>Correo</label>
                <input type="text" class="form-control text-center p-2"
                placeholder="Usuario" name="username">
            </div>
            <div class="form-group mt-2">
            <label>Password</label>
            <input type="password" class="form-control text-center p-2"
            placeholder="Contraseña" name="password">
            </div>
            <div class="text-center">
            <a href="registrar.php">REGISTRARME</a>
            <input type="submit" value="Acceder"
            class="btn btn-primary mt-3 w-100 p-2" name="login-btn">
            </div>
        </form>        
        </div>
        <div class="card-footer p-3">
        <div class="d-flex justify-content-center">
        <div class="text-primary"></div>
        </div>
        </div>
        </div>

        </div>
    <footer>

    </footer>
</body>
</html>