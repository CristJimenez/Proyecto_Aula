<?php

require_once __DIR__ . "/../modelo/persistencia/CrudEstudiantelmp.php";

class ControladorEstudiante
{
    public static function actuar()
    {
        $accion = $_REQUEST['accion'];

        switch ($accion) {
            case 'INSERTAR':
                ControladorEstudiante::insertar_estudiante();
                break;

            case 'ELIMINAR':
                ControladorEstudiante::eliminar_estudiante();
                break;

            case 'MODIFICAR':
                ControladorEstudiante::modificar();
                break;

            case 'CONSULTAR_TODO':
                ControladorEstudiante::consultar_todo();
                break;
            default;

                throw new Exception('Accion Incorrecta');
        }
    }

    public static function insertar_estudiante()
    {
        $huella_persona = @$_REQUEST['huella'];
        $estadoActivo = @$_REQUEST['estado'];
        $CARRERA = @$_REQUEST['carrera'];
        $semestre = @$_REQUEST['semestre'];


        $crud = new CrudEstudiantelmp();

        try {
            $existe = $crud->consultarPorId($huella_persona);
            $msj = "El estudiante con esa huella ya existe";
            header("Location: ../Vistas/web/estudiante/InsertarEstudiante.php?msj=$msj");
            return;
        } catch (Exception $e) {
        }

        // Asegúrate de que el constructor y setters estén usando los nombres correctos
        $u = new estudiante($huella_persona, $estadoActivo, $CARRERA, $semestre);

        $u->setHuella_persona($huella_persona);
        $u->setEstadoActivo($estadoActivo);
        $u->setCARRERA($CARRERA);
        $u->setSemestre($semestre);

        $crud = new CrudEstudiantelmp();


        $crud->Insertar($u);

        $total = $crud->contar();

        $msj = "Estudiantes agregados, Total: " . $total;

        header("Location: ../Vistas/web/estudiante/InsertarEstudiante.php?msj=$msj");
    }

    public static function eliminar_estudiante()
    {
        $huella_persona = $_REQUEST['huella'];
        $crud = new CrudEstudiantelmp();
        $crud->eliminarPorId($huella_persona);
        $total = $crud->contar();
        $msj = "Estudiantes eliminados, Total: " . $total;

        header("Location: ../Vistas/web/estudiante/eliminarEstudiante.php?msj=$msj");
    }

    public static function modificar()
    {

        $huella_persona = @$_REQUEST['huella'];
        $estadoActivo = @$_REQUEST['estado'];
        $CARRERA = @$_REQUEST['carrera'];
        $semestre = @$_REQUEST['semestre'];


        $u = new estudiante($huella_persona, $estadoActivo, $CARRERA, $semestre);

        $crud = new CrudEstudiantelmp();

        $crud->modificar($u);
        $total = $crud->contar();

        $msj = "Estudiantes modificados, Total: " . $total;

        header("Location: ../Vistas/web/estudiante/modificarEstudiante.php?msj=$msj");
    }
    public static function consultar_todo()
    {
        session_start();
        $crud = new CrudEstudiantelmp();
        $_SESSION['estudiantes'] = $crud->consultarTodo();

        header("Location: ../Vistas/web/estudiante/mostrarEstudiante.php");
        exit();
    }
}
ControladorEstudiante::actuar();
