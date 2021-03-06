<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">
    <title>Acceso administrador</title>
</head>
<body>
<nav>
    <div class="nav-wrapper">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Ingresar como usuario</a></li>
        </ul>
    </div>
</nav>
<img class="wave" src="img/wave.png">
	<div class="contenedor">
		<div class="img">
			<img src="">
		</div>
		<div class="login-content">
			<form action="controllers/ControlLoginAdmin.php" method="POST">
				<img src="img/avatar.png">
				<h3 class="title">Acceso administrador</h3>
        <div class="input-div one">
        <div class="i">
            <i class="fas fa-user"></i>
        </div>
        <div class="div">
            <h5>Rut</h5>
            <input type="text" name="nombre" class="input">
        </div>
        </div>
        <div class="input-div pass">
            <div class="i"> 
                <i class="fas fa-lock"></i>
            </div>
            <div class="div">
                <h5>Contraseña</h5>
                <input type="password" name="clave" class="input">
            </div>
        </div>
            <button class="boton">Entrar</button>
            <p class="error">
                    <?php
                    session_start();
                    if(isset($_SESSION['errora'])){
                        echo $_SESSION['errora'];
                        unset($_SESSION['errora']);
                    }
                    ?>
                </p>
            </form>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>                
<script src="https://kit.fontawesome.com/254082c399.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>