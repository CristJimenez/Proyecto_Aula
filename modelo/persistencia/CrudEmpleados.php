<?php


$ruta = $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Aula/";
require_once "ICrudBd.php";
require_once $ruta . "modelo/entidades/empleados.php";

require_once $ruta . "utilidades/bd/ConexionBdMySQLImp.php";




 class CrudEmpleadoImp implements ICrudBd
{



    
 public function consultarPorId($huella){
    
    $sql = "SELECT * FROM empleados where huella_persona = '$huella' ";

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

   $sql = "INSERT INTO empleados (huella_persona, horario, cargo, Departamento)
        VALUES ('" . $empleados->getHuella() . "',
                '" . $empleados->getHorario() . "',
                '" . $empleados->getCargo() . "',
                '" . $empleados->getDepartamento() . "')";

        $conBd = ConexionBDMYSQLImp::getInstance();
        $conBd->conectar();

        $conBd->transaccion($sql);
   }


public function eliminarPorId($huella_persona)
        {

            $sql = "DELETE FROM empleados
            WHERE huella_persona = '$huella_persona'";

            $conBd = ConexionBDMYSQLImp::getInstance();
            $conBd->conectar();
            $conBd->transaccion($sql);

        }

        public function modificar ($objeto)
        {

             $sql = "UPDATE empleados SET
       
             horario ='" . $objeto->getHorario() ."',
                cargo ='" . $objeto->getCargo() ."',
                Departamento ='" . $objeto->getDepartamento() ."'
                 WHERE huella_persona = '" . $objeto->getHuella() . "'";

                $conBd = ConexionBDMYSQLImp::getInstance();
                $conBd->conectar();
                $conBd->transaccion($sql);


    
        }
           
        

         public function contar()
        {
            $sql ="SELECT count(huella_persona) as total
            FROM empleados";

            $conBd = ConexionBDMYSQLImp::getInstance();
            $conBd->conectar();
            $resultado = $conBd->consultar($sql);
            $filas = $resultado->fetch_all(MYSQLI_BOTH);
            if (count($filas) > 0) {
                return $filas[0]["total"];
                # code...
            } else {
                throw new Exception("Consulta vacia");
                # code...
            }
            
        



        }

             public function cargarEmpleado($fila): empleados{


            $e = new empleados($fila[0], $fila[1],$fila["horario"],departamento: $fila["Departamento"]);

            
            return $e;
        }

}

