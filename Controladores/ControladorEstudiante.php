<?php



require_once "../modelo/persistencia/CrudEstudiantelmp.php";

class ControladorEstudiante
{
    public static function actuar()
    {
        $accion = $_REQUEST['accion'];

        switch ($accion) {
            case 'INSERTAR':
                ControladorEstudiante::insertar_estudiante();
                break;

                default:

                throw new Exception('Accion Incorrecta');


        }
    }

    public static function insertar_estudiante()
{
    $huella_persona = @$_REQUEST['huella'];
    $estadoActivo = @$_REQUEST['estado'];
    $CARRERA = @$_REQUEST['carrera'];
    $semestre = @$_REQUEST['semestre'];

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

}
ControladorEstudiante::actuar();

?>