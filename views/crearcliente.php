<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Ingresar Cliente</title>
</head>
<body>
    <?php
        session_start(); 
        if(isset($_SESSION['usuario'])){?>
    <nav class="barra">
    <div class="nav-wrapper">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="active"><a href="crearcliente.php">Crear cliente</a></li>
            <li><a href="#">Buscar receta</a></li>
            <li><a href="#">Ingreso</a></li>
            <li><a href="saliruser.php">Salir</a></li>
        </ul>
    </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col l4 m4 s12">
            </div>
            <div class="col l4 m4 s12">
                <h3>Ingresar cliente</h3>
                <form action="../controllers/ControlNuevoCliente.php" method="POST">
                    <div class="input-field">
                        <input id="rut" type="text" name="rut">
                        <label for="rut">Rut del cliente</label>
                    </div>
                    <div class="input-field">
                        <input id="nombre" type="text" name="nombre">
                        <label for="nombre">Nombre del cliente</label>
                    </div>
                    <div class="input-field">
                        <input id="direccion" type="text" name="direccion">
                        <label for="direccion">Direccion del cliente</label>
                    </div>
                    <div class="input-field">
                        <input id="telefono" type="text" name="telefono">
                        <label for="telefono">Numero de contacto</label>
                    </div>
                    <div class="input-field">
                        <input id="fecha" type="text" name="fecha" class="datepicker">
                        <label for="fecha">Fecha creación</label>
                    </div>
                    <div class="input-field">
                        <input id="email" type="email" name="email">
                        <label for="email">Email de contacto</label>
                    </div>
                    <button class="btn red">Crear</button>
                </form>
                <p class="red-text">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset ($_SESSION['error']);
                        }
                    ?>
                </p>
                <p class="green-text">
                <?php
                        if(isset($_SESSION['resp'])){
                            echo $_SESSION['resp'];
                            unset($_SESSION['resp']);
                        }
                    ?>
                </p>
            </div>
        </div>
    </div>
    <?php } else { ?>
        <?php if(!isset($_SESSION["usuario"])) { ?>
                <div class="container">
                    <div class="row">
                        <div class="l4 m4 s12">
                        </div>
                        <div class="l4 m4 s12">
                            <h4 class="refresh__title red-text">No tienes los permisos para estar aquí</h4>
                            <p class="refresh__p">Serás enviado de vuelta al principio en 3 segundos.</p>
                            <meta http-equiv="refresh" content="3;URL=../index.php">
                        </div>
                    </div>
                </div>
            <?php } ?>
    <?php } ?>
<script src="../js/crearcliente.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>