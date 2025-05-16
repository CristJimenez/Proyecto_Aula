<?php

    interface ICrudBd{


        //metodos abstractos
        public function consultarPorId($documento);

        public function consultarTodo();

        public  function agregar($objeto);

        public function eliminarPorId($documento);

        public function editar($objeto);

        public function contar();

    }


?>