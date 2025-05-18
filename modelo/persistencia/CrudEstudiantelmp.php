<?php

$ruta = $_SERVER["DOCUMENT_ROOT"] . "/PROAULA/Proyecto_Aula/";

require_once "ICrudBd.php";
require_once $ruta . "modelo/entidades/estudiante.php";
require_once $ruta . "utilidades/bd/ConexionBDMYSQLImp.php";

class CrudEstudiantelmp implements ICrudBd
{

    public function consultarPorId($id)
    {
        $sql = "Select * from estudiante where huella_estudiante = '$id' ";

        $conBd = ConexionBDMYSQLImp::getInstance();

        $conBd->conectar();

        $resultado = $conBd->consultar($sql);

        $filas = $resultado->fetch_all(MYSQLI_BOTH);

        if (count($filas) > 0) {
            return $this->cargarEstudiante($filas[0]);
        }else{

            throw new Exception("El estudiante con la HUELLA: $id No existe");

        }
    }

    public function consultarTodo()
    {
        
        $sql = "SELECT * FROM estudiante";
        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $resultado = $conBd->consultar($sql);
        $filas = $resultado->fetch_all(MYSQLI_BOTH);

        $lista_estudiantes = array();

        if ($resultado->num_rows > 0) {

            foreach ($filas as $i => $filas) {

                $u = $this->cargarEstudiante($filas);

                $lista_estudiantes[] = $u;
            }
        }

        if (count($lista_estudiantes) > 0) {

            return $lista_estudiantes;

        }else{

            throw new Exception("No existen Estudiantes registrados en el Sistema");
        }
    }

    public function Insertar($estudiante)
{
    $sql = "INSERT INTO estudiantes
            VALUES (
                '" . $estudiante->getEstadoActivo() . "',
                '" . $estudiante->getSemestre() . "',
                '" . $estudiante->getCARRERA() . "',
                '" . $estudiante->getHuella_persona() . "'
            )";

    $conBd = ConexionBDMYSQLImp::getInstance();
    $conBd->conectar();

    return $conBd->transaccion($sql);
}


    public function eliminarPorId($id)
    {
        
        $sql = "DELETE FROM estudiante 
         WHERE huella_estudiante = '$id'";

         $conBd = ConexionBDMYSQLImp::getInstance();
         $conBd->conectar();

         $conBd->transaccion($sql);
    }

    public function modificar($objeto)

    {
        
        $sql = "UPDATE estudiante
        SET huella_persona  = '" . $objeto->getHuella_persona() . "',
        estado = '" . $objeto->getEstado() . "',
        carrera = '" . $objeto->getCarrera() . "',
        semestre = '" . $objeto->getSemestre() . "'";
        

        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $conBd->transaccion($sql);

    }

    public function contar()
    {
        
        $sql = "SELECT count(huella_estudiante) as total
        FROM estudiante";

        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $resultado = $conBd->consultar($sql);

        $filas = $resultado->fetch_all(MYSQLI_BOTH);
        if(count($filas) > 0) {

            return $filas[0]["total"];

        }else{

            throw new Exception("Consulta Vacia");
        }
    }

    public function cargarEstudiante($fila)
    {

        $u = new estudiante($fila["huella_persona"], $fila["estadoActivo"], $fila["CARRERA"], $fila["semestre"]);

        $u->setHuella_persona($fila["Huella_persona"]);
        $u->setEstadoActivo($fila["estadoActivo"]);
        $u->setCarrera($fila["CARRERA"]);
        $u->setSemestre($fila["semestre"]);
        

        return $u;


    }
}
    

?>