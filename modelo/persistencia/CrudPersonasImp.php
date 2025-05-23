<?php

$ruta = $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Aula/";

require_once "ICrudBd.php";
require_once $ruta . "modelo/entidades/Personas.php";
require_once $ruta . "utilidades/bd/ConexionBdMySQLImp.php";

class CrudPersonasImp implements ICrudBd
{

    public function consultarPorId($documento)
    {
        $sql = "SELECT * FROM personas WHERE documento = '$documento'";

        $conBd = ConexionBDMYSQLImp::getInstance();

        $conBd->conectar();

        $resultado = $conBd->consultar($sql);

        $filas = $resultado->fetch_all(MYSQLI_BOTH);

        if (count($filas) > 0) {

            return $this->cargarUsuario($filas[0]);
        } else {
            throw new Exception("El usuarios con CC: $documento No existe");
        }
    }

    public function consultarTodo()
    {
        $sql = "SELECT * FROM  personas";
        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $resultado = $conBd->consultar($sql);
        $filas = $resultado->fetch_all(MYSQLI_BOTH);

        $lista_usuarios = array();

        if ($resultado->num_rows > 0) {

            foreach ($filas as $i => $fila) {

                $u = $this->cargarUsuario($fila);
                $lista_usuarios[] = $u;
            }
        }

        if (count($lista_usuarios) > 0) {
            return $lista_usuarios;
        } else {
            throw new Exception("No existen Usuarios en el sistema");
        }
    }


    public function insertar($usuario)
    {
        $sql = "INSERT INTO personas VALUE ('" . $usuario->getHuella() . "'
            ,'" . $usuario->getDocumento() . "'
            ,'" . $usuario->getNombres() . "'
            ,'" . $usuario->getApellidos() . "'
            ,'" . $usuario->getEmail() . "')";

        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $conBd->transaccion($sql);
    }

    public function eliminarPorId($documento)
    {
        $sql = "DELETE FROM personas WHERE documento = '$documento'";

        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $conBd->transaccion($sql);
    }

    public function modificar($objeto)
    {

        $sql = "UPDATE personas SET 
            documento = '" . $objeto->getDocumento() . "',
            nombres = '" . $objeto->getNombres() . "',
            apellidos = '" . $objeto->getApellidos() . "',
            email = '" . $objeto->getEmail() . "' WHERE huella = '" . $objeto->getHuella() . "'";

        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $conBd->transaccion($sql);
    }

    public function contar()
    {
        $sql = "SELECT count(documento) as total FROM personas";

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

    public function cargarUsuario($fila)
    {

        $u = new Personas($fila[0], documento: $fila[1], nombres: $fila["nombres"], apellidos: $fila["apellidos"], email: $fila["email"]);

        return $u;
    }

    public function consultarPorHuella($huella_persona)
    {
        $sql = "SELECT * FROM personas WHERE huella = '$huella_persona'";

        $conBd = ConexionBDMYSQLImp::getInstance();

        $conBd->conectar();

        $resultado = $conBd->consultar($sql);

        $filas = $resultado->fetch_all(MYSQLI_BOTH);

        if (count($filas) > 0) {

            return $this->cargarUsuario($filas[0]);
        } else {
            throw new Exception("El usuario no existe : $huella_persona No existe");
        }
    }
}

?>