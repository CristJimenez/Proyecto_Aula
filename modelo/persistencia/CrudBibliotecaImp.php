<?php

$ruta = $_SERVER['DOCUMENT_ROOT'] . "NOPAINNOGAIN/";

require_once "ICrudBd.php";
require_once $ruta . "modelo/entidades/biblioteca.php";
require_once $ruta . "utilidades/bd/ConexionBDMYSQLImp.php";

class CrudBibliotecaImp implements ICrudBd
{
    public function consultarPorId($id)
    {
        $sql = "SELECT * FROM biblioteca WHERE biblioteca_id = '$id'";

        $conBd = ConexionBDMYSQLImp::getInstance();

        $conBd->conectar();

        $resultado = $conBd->consultar($sql);

        $row = $resultado->fetch_all(MYSQLI_BOTH);

        if (count($row) > 0) {

            return $this->cargarBiblioteca($row[0]);

        } else {

            throw new Exception("La Biblioteca con el ID: $id No existe.");

        }
    }

    public function consultarTodo()
    {
        $sql = "SELECT * FROM biblioteca";

        $conBd = ConexionBDMYSQLImp::getInstance();

        $conBd->conectar();

        $resultado = $conBd->consultar($sql);

        $row = $resultado->fetch_all(MYSQLI_BOTH);

        $lista_biblioteca = array();

        if ($resultado->num_rows > 0) {

            foreach ($row as $i => $row) {

                $b = $this->cargarBiblioteca($row);

                $lista_biblioteca[] = $b;

            }

        }

        if (count($lista_biblioteca) > 0) {

            return $lista_biblioteca;

        } else {
            throw new Exception("No existen bibliotecas registradas en el sitema.");
        }
    }

    public function insertar($biblioteca)
    {
        $sql = "INSERT INTO biblioteca VALUE ('". $biblioteca->getBibliotecaid ."', 
        '". $biblioteca->getAforo ."', '". $biblioteca->getArea ."')";

        $conBd = ConexionBDMYSQLImp::getInstance();

        $conBd->conectar();

        $conBd->transaccion($sql);
    }

    public function eliminarPorId($id)
    {
        
    }

    public function cargarBiblioteca ($row)
    {
        $b = new biblioteca($row[0], $row[1], $row[2]);
        
        return $b;
    }
}
?>