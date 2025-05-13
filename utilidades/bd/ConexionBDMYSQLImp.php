<?php
include_once "IConexionBD.php";

class ConexionBDMYSQLImp implements IConexionBD {

    //propiedades
    private $host;
    private $port;
    private $database;
    private $user;
    private $password;
    private static $instancia;
    private $conexion;

    //constructor
    private function __construct ($host = 'localhost', $port = 3306, 
    $database = 'unicolombo', $user = 'root', $password = '')
    {
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->user = $$user;
        $this->password = $password;
    }

    //metodo para conectar con el smbdr mysql
    public function conectar () 
    {
        $this->conexion = new mysqli($this->host, $this->user, $this->password, $this->database);
    }

    //metodo para obtener objeto o instancia unica
    public static function getInstance ()
    {
        if (!ConexionBDMYSQLImp::$instancia) {
            ConexionBDMYSQLImp::$instancia = new ConexionBDMYSQLImp();
        }
        return ConexionBDMYSQLImp::$instancia;
    }

    //metodo para ejecutar consulta sql
    public function consultar($sql_select)
    {
        return $this->conexion->query($sql_select);
    }

    //metodo para ejecutar insert, delete y update
    public function transaccion($sql_transaccion, $tipo = "")
    {
        return $this->conexion->query($sql_transaccion);
    }

    //metodo para desconectar con el smbdr mysql
    public function desconectar () 
    {
        if ($this->conexion) {
            $this->conexion->close();
        }
        $this->conexion = null;
    }
}
?>