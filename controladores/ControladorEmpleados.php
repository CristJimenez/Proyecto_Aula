<?php
require_once '../modelo/persistencia/CrudEmpleados.php';
require_once '../modelo/entidades/empleados.php';

class ControladorEmpleados{

    public static function actuar(){
        $accion = $_REQUEST['accion'] ;

        switch (strtoupper($accion)) {
            case 'GUARDAR':
               ControladorEmpleados::guardar_empleados();
                break;
            
                 case 'CONSULTAR':
            ControladorEmpleados::consultar_empleado();
            break;

        case 'ELIMINAR':
            ControladorEmpleados::eliminar_empleado();
            break;


            case 'MODIFICAR';
            ControladorEmpleados::modificar();
            break;

        

                
            default:
                throw new Exception('Accion incorrecta');
                
        }
    }

    public static function guardar_empleados(){

        $huella = @$_REQUEST['huella'];
        $cargo =@$_REQUEST['cargo'];
        $horario = @$_REQUEST['horario'];
        $departamento = @$_REQUEST['departamento'];

        $e = new empleados($huella, $cargo, $horario, $departamento);
        $e->setHuella($huella);
        $e->setCargo($cargo);
        $e->setHorario($horario);
        $e->setDepartamento($departamento);

        $crud = new CrudEmpleadoImp();
        $crud->insertar($e);
        $total = $crud->contar();
        $msj = "Usuario agregado, Total: " . $total;
        header("Location: ../vistas/web/empleados/agregarempleado.php?msj=$msj");


    }
 public static function consultar_empleado() {

 
        // Verificamos que se envió la huella_persona desde el formulario
             session_start();
            $huella = $_POST['huella_persona'];
            $crud = new CrudEmpleadoImp();
            // Obtenemos el empleado usando el modelo por huella_persona
            $empleado = $crud->consultarPorId($huella);

            if(is_object($empleado)){

            $_SESSION['datos'] =[
                "horario" => $empleado->getHorario(),
                "cargo" => $empleado->getCargo(),
                "Departamento" => $empleado->getDepartamento(),
                "huella_persona" => $empleado->getHuella()

            ];
            }else{
                $_SESSION['datos']=[];
            }

         
            header("Location: ../vistas/web/empleados/eliminar.php");
            exit(); 
            

           
    }

        public static function eliminar_empleado() {
 
            $huella = $_POST['huella_persona'];
            $crud = new CrudEmpleadoImp();
            $crud->eliminarPorId($huella);
            $total = $crud->contar();
            $msjeli = "Empleado eliminado correctamente. Quedan: " . $total;
                header("Location: ../vistas/web/empleados/eliminar.php?msjeli=$msjeli");
        
    }


    public static function modificar()
{

    $huella_persona = @$_REQUEST['huella_persona'];
    $cargo = @$_REQUEST['cargo'];
    $horario = @$_REQUEST['horario'];
    $departamento = @$_REQUEST['Departamento'];
   

    $e = new empleados($huella_persona, $cargo, $horario, $departamento);

    $crud = new CrudEmpleadoImp();

    $crud->modificar($u);
    $total = $crud->contar();

    $msj = "Estudiantes modificados, Total: " . $total;

    header("Location: ../Vistas/web/empleados/modificarEmpleado.php?msj=$msj");
    

}


}

ControladorEmpleados::actuar();