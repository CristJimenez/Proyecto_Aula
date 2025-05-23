<?php
require_once '../modelo/persistencia/CrudEmpleados.php';
require_once '../modelo/entidades/empleados.php';

class ControladorEmpleados
{

    public static function actuar()
    {
        $accion = $_REQUEST['accion'];

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

   public static function guardar_empleados() {
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
    } catch (Exception $ex) {
        // Aquí se captura el error de duplicado o cualquier otro
        if (str_contains($ex->getMessage(), 'Duplicate entry')) {
            $msj = "❌ Error: La huella '$huella' ya está registrada.";
        } else {
            $msj = "❌ No existe una persona con esa huella: " ;
        }

        header("Location: ../vistas/web/empleados/agregarempleado.php?error=" . urlencode($msj));
    }
}

    public static function consultar_empleado()
    {


        // Verificamos que se envió la huella_persona desde el formulario
        session_start();
        $huella = $_POST['huella_persona'];
        $crud = new CrudEmpleadoImp();
        // Obtenemos el empleado usando el modelo por huella_persona
        $empleado = $crud->consultarPorId($huella);

        if ($empleado) {

            $_SESSION['datos'] = [
                "horario" => $empleado->getHorario(),
                "cargo" => $empleado->getCargo(),
                "Departamento" => $empleado->getDepartamento(),
                "huella_persona" => $empleado->getHuella()

            ];
        } else {
            $_SESSION['datos'] = [];
        }


        header("Location: ../vistas/web/empleados/eliminar.php");
        exit();
    }

    public static function eliminar_empleado()
    {

        $huella = $_POST['huella_persona'];
        $crud = new CrudEmpleadoImp();
        $crud->eliminarPorId($huella);
        $total = $crud->contar();
        $msjeli = "Empleado eliminado correctamente. Quedan: " . $total;
        header("Location: ../vistas/web/empleados/eliminar.php?msjeli=$msjeli");
    }

 public static function modificar() {
    $huella_persona = @$_REQUEST['huella'];
    $cargo = @$_REQUEST['cargo'];
    $horario = @$_REQUEST['horario'];
    $departamento = @$_REQUEST['departamento'];

    $crud = new CrudEmpleadoImp();

    try {
        // ✅ Verificamos si la huella existe
        $crud->consultarPorId($huella_persona); // Esto lanza una excepción si no existe

        $u = new empleados($huella_persona, $cargo, $horario, $departamento);
        $crud->modificar($u);

        $msj = "Empleados modificados correctamente.";
        header("Location: ../Vistas/web/empleados/modificarEmpleado.php?msj=" . urlencode($msj));
    } catch (Exception $ex) {
        $error = "❌ " . $ex->getMessage();
                    $msj = "❌ No existe una persona con esa huella: " ;

        header("Location: ../Vistas/web/empleados/modificarEmpleado.php?error=" . urlencode($error));
    }
}
    public static function consultar_todo()
    {
        session_start();
        $crud = new CrudEmpleadoImp();
        $_SESSION['empleados'] = $crud->consultarTodo();

        header("Location: ../Vistas/web/empleados/mostrarEmpleado.php");
        exit();
    }
}



ControladorEmpleados::actuar();
