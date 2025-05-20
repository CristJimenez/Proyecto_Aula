<?php

include_once "IConexionBD.php";

class ConexionBDMYSQLImp implements IConexionBD{

    //Propiedades
    private $host;
    private $port;
    private $database;
    private $user;
    private $password;
    private static $instancia;
    private $conexion;

    //Constructor
    private function __construct(
        $host = "localhost",
        $port = "3306",
        $database = "unicolombob",
        $user = "root",
        $password = ""
    )
    {
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
    }

    //Metodo para conectar con el SMBDR y la base de datos
    public function conectar(){
       $this-> conexion = new mysqli($this->host,$this->user,$this->password,$this->database);
    }

    public static function getInstance(){

        if(!ConexionBDMYSQLImp::$instancia){

            ConexionBDMYSQLImp::$instancia = new ConexionBDMYSQLImp();
        }

        return ConexionBDMYSQLImp::$instancia;
    }

    public function consultar($sql_select)
    {
        return $this ->conexion->query($sql_select);

    }

    public function transaccion($sql_transaccion, $tipo = "")
    {
        $this->conexion->query($sql_transaccion);
    }

    public function desconectar()
    {
        if($this->conexion){
            $this->conexion->close();
        }
    }

}



?>