<?php
require_once '../modelo/persistencia/CrudEmpleados.php';

class ControladorEmpleados{

    public static function actuar(){
        $accion = $_REQUEST['accion'];

        switch ($accion) {
            case 'Guardar':
               ControladorEmpleados::guardar_empleados();
                break;
            
            default:
                throw new Exception('Accion incorrecta');
                
        }
    }

    public static function guardar_empleados(){

        $id = @$_REQUEST['cc'];
        $cargo =@$_REQUEST['cargo'];
        $horario = @$_REQUEST['horario'];
        $departamento = @$_REQUEST['departamento'];

        $e = new Empleados($id, $cargo);
        $e->setBiblioteca_id($id);
        $e->setCargo($cargo);
        $e->setHorario($horario);
        $e->setDepartamento($departamento);

        $crud = new CrudEmpleadoImp();
        $crud->insertar($e);
        $total = $crud->contar();
        $msj = "Usuario agregado, Total: " . $total;
        header("Location: ../vistas/web/empleados/agregarempleados.php?msj=$msj");


    }
}

ControladorEmpleados::actuar();