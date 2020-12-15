<?php

namespace controllers;

use models\RecetaModel as RecetaModel;

require_once("../models/RecetaModel.php");

class ControlNuevaReceta{
    public $tipo_lente;
    public $esferaoiz;
    public $esferaode;
    public $cilindrooiz;
    public $cilindroode;
    public $ejeoiz;
    public $ejeode;
    public $prisma;
    public $base;
    public $armazon;
    public $material_cristal;
    public $tipo_cristal;
    public $distancia_pupilar;
    public $valor_lente;
    public $fecha_entrega;
    public $fecha_retiro;
    public $observacion;
    public $rut_cliente;
    public $fecha_vis_med;
    public $rut_medico;
    public$nombre_med;
    public $rut_usuario;

    public function __construct()
    {
        $this->tipo_lente = $_POST['tipo']; //1
        $this->esferaoiz = $_POST['esferaiz']; //2
        $this->esferaode = $_POST['esferade']; //3
        $this->cilindrooiz = $_POST['cilindroiz']; //4
        $this->cilindroode = $_POST['cilindrode']; //5
        $this->ejeoiz = $_POST['ejeiz'];//6
        $this->ejeode = $_POST['ejede'];//7
        $this->prisma = $_POST['prisma'];//8
        $this->base = $_POST['base'];//9
        $this->armazon = $_POST['armazon'];
        $this->material_cristal = $_POST['materialcristal'];
        $this->tipo_cristal = $_POST['tipocristal'];
        $this->distancia_pupilar = $_POST['distanciapup'];
        $this->valor_lente = $_POST['valor'];
        $this->fecha_entrega = $_POST['fechaen'];
        $this->fecha_retiro = $_POST['fechare'];
        $this->observacion = $_POST['observacion'];
        $this->rut_cliente = $_POST['rutcliente'];
        $this->fecha_vis_med = $_POST['fechamed'];
        $this->rut_medico = $_POST['rutmed'];
        $this->nombre_med = $_POST['nombremed'];
        $this->rut_usuario = $_POST['rutusuario'];
    }

    public function ingresarReceta(){
        session_start();
        if(
            $this->tipo_lente=="" || $this->esferaoiz=="" || $this->esferaode=="" || $this->cilindrooiz=="" ||
            $this->cilindroode=="" || $this->ejeoiz=="" || $this->ejeode=="" || $this->prisma=="" || $this->base=="" ||
            $this->armazon=="" || $this->material_cristal=="" || $this->tipo_cristal=="" || $this->distancia_pupilar=="" ||
            $this->valor_lente=="" || $this->fecha_entrega=="" || $this->fecha_retiro=="" || $this->observacion=="" ||
            $this->rut_cliente=="" || $this->fecha_vis_med=="" || $this->rut_medico=="" || $this->nombre_med=="" || $this->rut_usuario==""
        ){
            $_SESSION['error']="Los campos están vacíos";
            header("Location:../views/crearreceta.php");
            return;
        }

            $model = new RecetaModel();
            $data = [
                'tipolente'=>$this->tipo_lente,'esferaoiz'=>$this->esferaoiz,'esferaode'=>$this->esferaode,'cilindrooiz'=>$this->cilindrooiz,
                'cilindroode'=>$this->cilindroode,'ejeoiz'=>$this->ejeoiz,'ejeode'=>$this->ejeode,'prisma'=>$this->prisma,'base'=>$this->base,
                'armazon'=>$this->armazon,'materialcristal'=>$this->material_cristal,'tipocristal'=>$this->tipo_cristal,'distanciapupilar'=>$this->distancia_pupilar,
                'valorlente'=>$this->valor_lente,'fechaentrega'=>$this->fecha_entrega,'fecharetiro'=>$this->fecha_retiro,'observacion'=>$this->observacion,'rutcliente'=>$this->rut_cliente,
                'fechamed'=>$this->fecha_vis_med,'rutmedico'=>$this->rut_medico,'nombremedico'=>$this->nombre_med,'rutusuario'=>$this->rut_usuario
            ];

            $count = $model->nuevaReceta($data);

            if($count==1){
                $_SESSION['resp']="Receta agregada";
            }else{
                $_SESSION['error']="Hubo un problema en la base de datos";
            }
            header("Location:../views/crearreceta.php");
    }
}
$obj = new ControlNuevaReceta();
$obj->ingresarReceta();