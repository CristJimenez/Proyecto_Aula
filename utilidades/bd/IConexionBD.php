<?php
interface IConexionBD{
    //metodos abstractos
    public function conectar ();
    public function desconectar ();

    //select, joins, subselect, vistas
    public function consultar ($sql_select);

    //insert, update, select
    public function transaccion ($sql_transaccion, $tipo = "");
}
?>