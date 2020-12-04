<?php

namespace models;

require_once("Conexion.php");

class RecetaModel{
    //insertar receta
    public function nuevaReceta($data){
        $stm = Conexion::conector()->prepare("INSERT INTO receta VALUES(NULL,:tipolente,:esferaoiz,:esferaode,:cilindrooiz,:cilindroode,:ejeoiz,:ejeode,:prisma,:base,:armazon,:materialcristal,:tipocristal,:distanciapupilar,:valorlente,:fechaentrega,:fecharetiro,:observacion,:rutcliente,:fechavimed,:rutmedico,:nombremedico,:rutusuario,1)");
        $stm->bindParam(":tipolente",$data['tipolente']);
        $stm->bindParam(":esferaoiz",$data['esferaoiz']);
        $stm->bindParam(":esferaode",$data['esferaode']);
        $stm->bindParam(":cilindrooiz",$data['cilindrooiz']);
        $stm->bindParam(":cilindroode",$data['cilindroode']);
        $stm->bindParam(":ejeoiz",$data['ejeoiz']);
        $stm->bindParam(":ejeode",$data['ejeode']);
        $stm->bindParam(":prisma",$data['prisma']);
        $stm->bindParam(":base",$data['base']);
        $stm->bindParam(":armazon",$data['armazon']);
        $stm->bindParam(":materialcristal",$data['materialcristal']);
        $stm->bindParam(":tipocristal",$data['tipocristal']);
        $stm->bindParam(":distanciapupilar",$data['distanciapupilar']);
        $stm->bindParam(":valorlente",$data['valorlente']);
        $stm->bindParam(":fechaentrega",$data['fechaentrega']);
        $stm->bindParam(":fecharetiro",$data['fecharetiro']);
        $stm->bindParam(":observacion",$data['observacion']);
        $stm->bindParam(":rutcliente",$data['rutcliente']);
        $stm->bindParam(":fechavimed",$data['fechavimed']);
        $stm->bindParam(":rutmedico",$data['rutmedico']);
        $stm->bindParam(":nombremedico",$data['nombremedico']);
        $stm->bindParam(":rutusuario",$data['rutusuario']);
        return $stm->execute();
    }
}