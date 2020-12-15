<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Buscar receta</title>
</head>
<body>
<nav>
    <div class="nav-wrapper">
    <a class="brand-logo center">Ingresar receta</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="crearcliente.php">Crear cliente</a></li>
            <li class="active"><a href="buscarreceta.php">Buscar receta</a></li>
            <li><a href="crearreceta.php">Ingresar receta</a></li>
            <li><a href="saliruser.php">Salir</a></li>
        </ul>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
    <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
    <div class="background">
        <img src="../img/fondo.jpg">
    </div>
        <a href="#user"><img class="circle" src="../img/user.png"></a>
        <a href="#name"><span class="white-text name">Nombre</span></a>
        <a href="#email"><span class="white-text email">Correo</span></a>
    </div>
    </li>
        <li><a href="crearcliente.php">Crear cliente</a></li>
        <li class="active"><a href="buscarreceta.php">Buscar receta</a></li>
        <li><a href="crearreceta.php">Ingresar receta</a></li>
        <li><a href="saliruser.php">Cerrar sesión</a></li>
    </ul>
<!--BOTON DE BUSCAR POR RUT Y FECHA-->
<div id="app" class="container">
            <h4>Buscar Receta</h4>
            <div class="row">
                <div class="col l6 m4 s12">
                    <form @submit.prevent="buscarRut">
                        <div class="input-field">
                            <input type="text" v-model="rut">
                            <label for="rut">Rut</label>
                        </div>
                        <button class="btn black ancho-100">
                            buscar
                        </button>
                    </form>
                </div>
                <div class="col l6 m4 s12">
                    <form @submit.prevent="buscarFecha">
                        <div class="input-field">
                            <input type="text" class="datepicker" v-model="fecha" id="buscar_fecha">
                            <label for="fecha">Fecha creación</label>
                        </div>
                        <button class="btn black ancho-100">
                            buscar
                        </button>
                    </form>
                </div>
            </div> 
                <table>
                    <tr>
                        <th>Armazon</th>
                        <th>Tipo</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <tr v-for="r in recetas">
                        <td>{{r.armazon}}</td>
                        <td>{{r.tipo_cristal}}</td>
                        <td>{{r.nombre_cliente}}</td>
                        <td>{{r.fecha_entrega}}</td>
                        <td>
                            <button @click="abrirModal(r)" class="btn-small blue">
                                detalle
                            </button>
                        </td>
                        <td>
                            <i class="fas fa-file-pdf"></i>
                        </td>
                    </tr>
                </table>
                <!--MODAL A MOSTRAR-->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h5>Detalle de Receta Nº: {{receta.id}}</h5>
                        <hr>
                        <div class="row">
                            <div class="col l6">
                                Esfera Izq: {{receta.esfera_oi}}
                            </div>
                            <div class="col l6">
                                Esfera Der: {{receta.esfera_od}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col l6">
                                Tipo Lente: {{receta.tipo_lente}}
                            </div>
                            <div class="col l6">
                                Cristal: {{receta.material_cristal}}
                            </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                        </div>
                </div>
                <!--END MODAL-->
        </div>
<!--FIN DE BUSCAR POR RUT Y FECHA-->
<script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
        //MODAL
        var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="../js/crearcliente.js"></script>
<script src="../js/buscarReceta.js"></script>
<script src="https://kit.fontawesome.com/254082c399.js" crossorigin="anonymous"></script>
</body>
</html>l