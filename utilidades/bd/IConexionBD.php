<?php 
interface IConexionBD{

    public function desconectar();

    public function consultar($sql_sql);

    public function transaccion($sq_transaccion, $tipo = "");

    
}