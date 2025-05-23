<?php

$ruta = $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Aula/";

require_once "ICrudBdReg.php";
require_once $ruta . "modelo/entidades/registro.php";
require_once $ruta . "utilidades/bd/ConexionBdMySQLImp.php";

class CrudRegistroImp implements ICrudBdReg
{
    public function contar()
    {
        $sql = "SELECT count(huella_de_persona) as total FROM registro";

        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $resultado = $conBd->consultar($sql);
        $filas = $resultado->fetch_all(MYSQLI_BOTH);

        if (count($filas) > 0) {
            return $filas[0]['total'];
        } else {
            throw new Exception("Consulta Vacia");
        }
    }

    public function insertar($registro)
    {
        $sql = "INSERT INTO registro VALUE ('" . $registro->getHoraEntra() . "'
            ,'" . $registro->getHoraSale() . "'
            ,'" . $registro->getHuella_persona() . "'
            ,'" . $registro->getCodBiblioteca() . "')";

        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $conBd->transaccion($sql);
    }

    public function consultarTodo()
    {
        $sql = "SELECT * FROM  registro";
        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $resultado = $conBd->consultar($sql);
        $filas = $resultado->fetch_all(MYSQLI_BOTH);

        $lista_registros = array();

        if ($resultado->num_rows > 0) {

            foreach ($filas as $i => $fila) {

                $r = $this->cargarRegistro($fila);
                $lista_registros[] = $r;
            }
        }

        if (count($lista_registros) > 0) {
            return $lista_registros;
        } else {
            throw new Exception("No existen Usuarios en el sistema");
        }
    }

    public function cargarRegistro($fila)
    {

        $u = new registro(horaEntra: $fila[0], horaSale: $fila[1], huella_persona: $fila["huella_de_persona"], codBiblioteca: $fila["codBiblioteca"]);

        return $u;
    }
}
