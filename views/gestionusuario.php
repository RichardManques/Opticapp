<?php
use models\UsuarioModel as UsuarioModel;
require_once("../models/UsuarioModel.php");
$model = new UsuarioModel();
$lista = $model->listaUsuarios();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Gestion Usuario</title>
</head>
<body>
<?php
    session_start(); 
    if(isset($_SESSION['admin'])){ 
?>
<nav>
    <div class="nav-wrapper">
        <a class="brand-logo center">GESTION USUARIO</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="saliradmin.php">Salir</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col l4 m4 s12">
            <?php if(!isset($_SESSION['edit'])) { ?>
                <!--INICIO CREAR USUARIO-->
                <h4 class="center">Crear usuario</h4>
                    <form action="../controllers/ControlNuevoUsuario.php" method="POST">
                        <div class="input-field">
                            <input id="rut" type="text" name="rut">
                            <label for="rut">Rut</label>
                        </div>
                        <div class="input-field">
                            <input id="nombre" type="text" name="nombre">
                            <label for="nombre">Nombre</label>
                        </div>
                        <button class="btn blue">Crear usuario</button>
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
                            if(isset($_SESSION['answer'])){
                                echo $_SESSION['answer'];
                                unset ($_SESSION['answer']);
                            }
                        ?>
                    </p>
            <!--FIN CREAR USUARIO-->
            <?php } else { ?>
            <!--EDITAR ESTADO DEL USUARIO--->
            <h4 class="center">Editar usuario</h4>
            <form action="../controllers/ControlEditarEstado.php" method="POST">
                    <div class="input-field">
                        <input readonly id="rut" type="text" name="rut" value="<?=$_SESSION['lista']['rut']?>">
                        <label for="rut">Rut</label>
                    </div>
                    <div class="input-field">
                        <input readonly id="nombre" type="text" name="nombre" value="<?=$_SESSION['lista']['nombre']?>">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field">
                        <select name="estado">
                            <option value=0>Bloquear</option>
                            <option value=1>Habilitar</option>
                        </select>
                    </div>
                <button class="btn orange">Editar usuario</button>
            </form>
            <!--FIN EDITAR ESTADO DEL USUARIO--->
            <?php
                    unset( $_SESSION['edit']);
                    unset($_SESSION['lista']);
                    } 
            ?> 
            </div>
            <div class="col l8 m8 s12">
                <h4 class="center">Lista de usuarios</h4>
                <form action="../controllers/ControlTablaUsuario.php" method="POST">
                <table>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Modificar</th>
                    </tr>
                    <?php foreach ($lista as $item) { ?>
                    <tr>
                        <td><?=$item["rut"]?></td>
                        <td><?=$item["nombre"]?></td>
                        <td>
                        <?php if($item["estado"]==0){?>
                            <p class="red-text">
                                Bloqueado
                            </p>    
                        <?php }else { ?>
                            <p class="green-text">
                                Habilitado
                            </p>
                                <?php } ?>
                        </td>
                        <td>
                            <button name="bt_edit" value="<?=$item['rut']?>" class="btn orange">Editar</button>
                        </td>
                    </tr>    
                    <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?php }else { ?>
    <?php if(!isset($_SESSION['admin'])){ ?>
        <div class="container">
            <div class="row">
                <div class="l4 m4 s12"></div>
                <div class="l4 m4 s12">
                <h4 class="refresh__title">No tienes los permisos para estar aquí</h4>
                    <p class="refresh__p">Serás enviado de vuelta al principio en 3 segundos.</p>
                    <meta http-equiv="refresh" content="3;URL=../index.php">
                </div>
            </div>
        </div>
    <?php }?>
<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://kit.fontawesome.com/254082c399.js" crossorigin="anonymous"></script>
<script src="../js/gestionusuario.js"></script>
</body>
</html>