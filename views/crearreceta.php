<?php
use models\RecetaModel as RecetaModel;
require_once("../models/RecetaModel.php");
session_start();
/*$model = new RecetaModel();
$receta = [
    "id"=>null,
    "tipolente"=>'Lejos',//tipo lente 2
    "esferaoiz"=>0.50,//esfera ojo izquierdo 3
    "esferaode"=>0.50,//esfera ojo derecho 4
    "cilindrooiz"=>0.50,//cilindro ojo izquierdo 5
    "cilindroode"=>0.50,//cilindro ojo derecho 6
    "ejeoiz"=>50,//eje ojo izquierdo 7
    "ejeode"=>60,//eje ojo derecho 8
    "prisma"=>2,//prisma 9
    "base"=>'Superior',//base 10
    "armazon"=>1,//armazon 11
    "materialcristal"=>1,//material cristal 12
    "tipocristal"=>1,//tipo cristal 13
    "distanciapupilar"=>50,//distancia pupilar 14
    "valorlente"=>100.000,//valor lente 15
    "fechaentrega"=>20200505,//fecha entrega 16
    "fecharetiro"=>20200505, //fecha retiro 17
    "observacion"=>'debe retirar lo antes posible',//observacion 18
    "rutcliente"=>'1-1',//rut del cliente 19
    "fechavimed"=>20200505,//fecha visita al medico 20
    "rutmedico"=>'1-1',//rut del medico 21
    "nombremedico"=>'Juan perez',//nombre del medico 22
    "rutusuario"=>'20362843-9'//rut del vendedor 23];
];
$model->nuevaReceta($receta);
print_r($receta);*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Ingresar receta</title>
</head>
<body>
<nav>
    <div class="nav-wrapper">
    <a class="brand-logo center">Ingresar receta</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="crearcliente.php">Crear cliente</a></li>
            <li><a href="#">Buscar receta</a></li>
            <li class="active"><a href="crearreceta.php">Ingresar receta</a></li>
            <li><a href="saliruser.php">Salir</a></li>
        </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
    <!--BARRA MOVIL-->
    <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
    <div class="background">
        <img src="../img/fondo.jpg">
    </div>
        <a href="#user"><img class="circle" src="../img/user.png"></a>
        <a href="#name"><span class="white-text name"><?=$_SESSION['usuario']['nombre']?></span></a>
        <a href="#email"><span class="white-text email"><?=$_SESSION['usuario']['rut']?></span></a>
    </div>
    </li>
    <li><a href="crearcliente.php">Crear cliente</a></li>
            <li><a href="#">Buscar</a></li>
            <li class="active"><a href="crearreceta.php">Ingresar receta</a></li>
            <li><a href="saliruser.php">Cerrar sesión</a></li>
    </ul>
    <!--FIN BARRA MOVIL-->

    <!--INGRESAR RECETA-->
    <div class="container">
        <div class="row">
            <div class="col l4 m4 s12"></div>

            <div class="col l4 m4 s12">
            <form action="../controllers/ControlNuevaReceta.php" method="POST">
            <h5>Tipo</h5>
            <p>
                <label>
                <input type="checkbox" name="tipo" value="cerca" />
                <span>Cerca</span>
                </label>
            </p>
            <p>
                <label>
                <input type="checkbox" name="tipo" value="lejos" />
                <span>Lejos</span>
                </label>
            </p>

            <h6>Tipo Cristal</h6>
            <select name="tipocristal">
                <option>Selecciona una opción</option>
                <option value=1>Monofocal</option>
                <option value=2>Bifocal</option>
                <option value=3>Multifocal</option>
            </select>

            <h6>Material Cristal</h6>
            <select name="materialcristal">
                <option>Selecciona una opción</option>
                <option value=1>Orgánico</option>
                <option value=2>Policarbonato</option>
                <option value=3>Mineral</option>
                <option value=4>Alto Indice</option>
            </select>

            <h6>Base</h6>
            <select name="base">
                <option>Selecciona una opción</option>
                <option value="superior">Superior</option>
                <option value="inferior">Inferior</option>
                <option value="interna">Interna</option>
                <option value="externa">Externa</option>
            </select>
            
            <h6>Armazón</h6>
            <select name="armazon">
                <option>Selecciona una opción</option>
                <option value=1>Intermedio</option>
                <option value=2>Gama alta</option>
                <option value=3>Económico</option>
            </select>
            <h6>Ojo izquierdo</h6>
            <div class="input-field">
                <input id="esferaiz" type="text" name="esferaiz">
                <label for="esferaiz">Esfera izquierdo</label>
            </div>
            <div class="input-field">
                <input id="cilindroiz" type="text" name="cilindroiz">
                <label for="cilindroiz">Cilindro izquierdo</label>
            </div>
            <div class="input-field">
                <input id="ejeiz" type="text" name="ejeiz">
                <label for="ejeiz">Eje izquierdo</label>
            </div>

            <h6>Ojo derecho</h6>
            <div class="input-field">
                <input id="esferade" type="text" name="esferade">
                <label for="esferade">Esfera derecha</label>
            </div>
            <div class="input-field">
                <input id="cilindrode" type="text" name="cilindrode">
                <label for="cilindrode">Cilindro derecho</label>
            </div>
            <div class="input-field">
                <input id="ejede" type="text" name="ejede">
                <label for="ejede">Eje derecho</label>
            </div>
            
            <div class="input-field">
                <input id="prisma" type="text" name="prisma">
                <label for="prisma">Prisma</label>
            </div>

            <div class="input-field">
                <input id="distanciapup" type="text" name="distanciapup">
                <label for="distaciapup">Distancia pupilar</label>
            </div>

            <div class="input-field">
                <input id="fechaen" type="text" name="fechaen" class="datepicker">
                <label for="fechaen">Fecha de entrega</label>
            </div>
            
            <div class="input-field">
                <input id="fechare" type="text" name="fechare" class="datepicker">
                <label for="fechare">Fecha de retiro</label>
            </div>

            <div class="input-field">
                <input id="valor" type="text" name="valor">
                <label for="valor">Valor lente</label>
            </div>
            <textarea name="observacion" id="observacion" cols="30" rows="10"></textarea>
            
            <div class="input-field">
                <input id="rutcliente" type="text" name="rutcliente">
                <label for="rutcliente">Rut cliente</label>
            </div>
            
            <div class="input-field">
                <input id="fechavismed" type="text" name="fechavismed" class="datepicker">
                <label for="fechavismed">Fecha visita medico</label>
            </div>

            <div class="input-field">
                <input id="rutmed" type="text" name="rutmed">
                <label for="rutmed">Rut medico</label>
            </div>

            <div class="input-field">
                <input id="nombremed" type="text" name="nombremed">
                <label for="nombremed">Nombre medico</label>
            </div>
            <div class="input-field">
                <input id="rutusuario" type="text" name="rutusuario">
                <label for="rutusuario">Rut usuario</label>
            </div>
            <button class="btn black">Crear receta</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
    var instances = M.Sidenav.init(elems);
    });
</script>
<script src="../js/crearreceta.js"></script>
</body>
</html>