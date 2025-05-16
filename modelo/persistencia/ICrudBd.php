<?php

interface ICrudBd
{

    //metodos
    public function consultarPorId($id);

    public function consultarTodo();

    public function insertar($objeto);

    public function eliminarPorId($id);

    public function modificar($objeto);

    public function contar();
}

?>