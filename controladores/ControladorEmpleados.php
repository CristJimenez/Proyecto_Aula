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
        
            case 'CONSULTAR_TODO':
                            ControladorEmpleados::consultar_todo();
                            break;
                            
                
            default:
                throw new Exception('Accion incorrecta');
                
        }
    }

public static function guardar_empleados(){
    $huella = @$_REQUEST['huella'];
    $cargo = @$_REQUEST['cargo'];
    $horario = @$_REQUEST['horario'];
    $departamento = @$_REQUEST['departamento'];

    $e = new empleados($huella, $cargo, $horario, $departamento);

    $crud = new CrudEmpleadoImp();

    try {
        $crud->insertar($e);
        $total = $crud->contar();
        $msj = "Usuario agregado. Total: " . $total;
        header("Location: ../vistas/web/empleados/agregarempleado.php?msj=$msj");

    } catch (mysqli_sql_exception $ex) {
        if (str_contains($ex->getMessage(), 'Duplicate entry')) {
            $msj = "❌ Error: La huella '$huella' ya está registrada.";
        } else {
            $msj = "❌ Error inesperado: " . $ex->getMessage();
        }

        header("Location: ../vistas/web/empleados/agregarempleado.php?error=" . urlencode($msj));
    }
}

 public static function consultar_empleado() {
    session_start();
    $huella = $_POST['huella_persona'];
    $crud = new CrudEmpleadoImp();

    try {
        $empleado = $crud->consultarPorId($huella);

        $_SESSION['datos'] = [
            "horario" => $empleado->getHorario(),
            "cargo" => $empleado->getCargo(),
            "Departamento" => $empleado->getDepartamento(),
            "huella_persona" => $empleado->getHuella()
        ];

    } catch (Exception $e) {
        $_SESSION['datos'] = [];  // Limpia datos anteriores
        $_SESSION['error'] = $e->getMessage();  // Guarda el mensaje de error
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

    $huella_persona = @$_REQUEST['huella'];
    $cargo = @$_REQUEST['cargo'];
    $horario = @$_REQUEST['horario'];
    $departamento = @$_REQUEST['departamento'];
   

    $u = new empleados($huella_persona, $cargo, $horario, $departamento);

    $crud = new CrudEmpleadoImp();

    $crud->modificar($u);
    

    $msj = "Empleados modificados, Total: "  ;

    header("Location: ../Vistas/web/empleados/modificarEmpleado.php?msj=$msj");
}
public static function consultar_todo() {
    session_start();
    $crud = new CrudEmpleadoImp();
    $_SESSION['empleados'] = $crud->consultarTodo();

    header("Location: ../Vistas/web/empleados/mostrarEmpleado.php");
    exit();
}
}



ControladorEmpleados::actuar();