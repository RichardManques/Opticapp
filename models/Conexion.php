<?php
    namespace models;

class Conexion{
    public static $user="u6hvb1x01yfyh5zh";
    public static $pass="pUFY8Q5zInNwCCNyUId3";
    public static $URL="mysql:host=bm4zscbkudhtv5p4x5wc-mysql.services.clever-cloud.com;dbname=bm4zscbkudhtv5p4x5wc";

    public static function conector(){
        try{
            return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
        }catch(\PDOException $e){
            return null;
        }
    }
}