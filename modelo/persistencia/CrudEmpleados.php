<?php

$ruta = $_SERVER["DOCUMENT_ROOT"] . "crudphp/";
require_once "ICrudBd.php";
require_once $ruta . "modelo/entidades/Personas.php";
require_once $ruta . "utilidades/bd/ConexionBdMySQLImp.php";




 class CrudEmpleadoImp implements ICrudBd
{


    
 public function consultarPorId($huella){
    $sql = "Select * from empleado where huella = '$huella' ";

        $conBd = ConexionBDMYSQLImp::getInstance();

        $conBd->conectar();

        $resultado = $conBd->consultar($sql);

        $filas = $resultado->fetch_all(MYSQLI_BOTH);

        if (count($filas) > 0) {
            return $this->cargarEmpleado($filas[0]);
        }else{

            throw new Exception("El empleado con la HUELLA: $huella No existe");

        }
 }




public function consultarTodo() {

 $sql = "SELECT * FROM empleados";
        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $resultado = $conBd->consultar($sql);
        $filas = $resultado->fetch_all(MYSQLI_BOTH);

        $lista_empleados = array();

        if ($resultado->num_rows > 0) {

            foreach ($filas as $i => $filas) {

                $e = $this->cargarEmpleado($filas);

                $lista_empleados[] = $e;
            }
            if (count($lista_empleados) > 0) {

            return $lista_empleados;

        }else{

            throw new Exception("No existen Empleados registrados en el Sistema");
        }

    }
}


   public function insertar($empleados){

        $sql = "Insert into estudiantes
        Value ('" . $empleados->getHuella_empleado() . "'
        , '" . $empleados->getCargo() . "'
        , '" . $empleados->getHorario() . "'
        , '" . $empleados->getDeparatamento() . "')";

        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $conBd->transaccion($sql);
   }

public function eliminarPorId($documento)
        {

        }

        public function modificar ($objeto)
        {

        }

         public function contar()
        {

        }

             public function cargarEmpleado($fila): empleados{

            $e = new empleados($fila[0], $fila[1],$fila["nombres"],$fila["apellidos"],$fila["email"]);
            
            return $e;
        }
}

