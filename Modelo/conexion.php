<?php

class Conexion extends PDO{
     
    private static $instancia=null;
    private $host="localhost";
    private $userName="root";
    private $password="";
    private $dataBase="inventario_it";
    
    public function __construct() {
        try{
            parent:: __construct("mysql:host={$this->host};dbname={$this->dataBase}",
            $this->userName, $this->password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "set names 'UTF-8'");
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public static function singleton(){
        if(!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    /*public function __destruct(){
        
    }*/
}
?>