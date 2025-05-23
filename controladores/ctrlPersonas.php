<?php
require_once(__DIR__ . "/../modelo/persistencia/CrudPersonasImp.php");
//require_once "../modelo/persistencia/CrudPersonasImp.php";

class ctrlPersona
{
    public static function actuar()
    {
        $accion = $_REQUEST['accion'];

        switch ($accion) {
            case 'Guardar':

                ctrlPersona::guardar_persona();
                break;

            case 'Listar':
                ctrlPersona::consultar_todo();
                break;

            case 'Consultar':
                ctrlPersona::mostrarUno();
                break;

            case 'Eliminar':
                ctrlPersona::eliminar();
                break;

            case 'Modificar':
                ctrlPersona::modificarP();
                break;

            default:

                throw new Exception('Accion incorrecta');
        }
    }

    public static function guardar_persona()
    {

        $huella = @$_REQUEST['huella'];
        $documento = @$_REQUEST['cc'];
        $nombre = @$_REQUEST['nombre'];
        $apellido = @$_REQUEST['apellido'];
        $email = @$_REQUEST['email'];

        $u = new Personas($huella, $documento, $nombre, $apellido, $email);

        $u->setHuella($huella);
        $u->setDocumento($documento);
        $u->setNombres($nombre);
        $u->setApellidos($apellido);
        $u->setEmail($email);

        $crud = new CrudPersonasImp();

        $crud->insertar($u);

        $total = $crud->contar();

        $msj = "Usuario agregado, total: " . $total;

        header("Location: ../vistas/web/personas/addPersona.php?msj=$msj");
    }

    public static function consultar_todo()
    {
        session_start();
        $crud = new CrudPersonasImp();
        $_SESSION['usuarios'] = $crud->consultarTodo();

        header("Location: ../vistas/web/personas/mostrarUsuarios.php");
        exit();
    }

    public static function mostrarUno()
    {
        session_start();

        $redirect = $_POST['redireccion'] ?? '';
        $documento = $_POST['documento'];
        $crud = new CrudPersonasImp();
        $elemento = $crud->consultarPorId($documento);
        if ($elemento) {

            $_SESSION['datos'] = [

                "huella" => $elemento->getHuella(),
                "documento" => $elemento->getDocumento(),
                "nombres" => $elemento->getNombres(),
                "apellidos" => $elemento->getApellidos(),
                "email" => $elemento->getEmail()

            ];
        } else {
            $_SESSION['datos'] = [];
        }

        if (!empty($redirect)) {

            header("Location: ../vistas/web/personas/modificarPersona.php");
        } else {
            header("Location: ../vistas/web/personas/eliminarPersona.php ");
            exit();
        }
    }

    public static function eliminar()
    {
        $documento = $_POST['documento'];
        $crud = new CrudPersonasImp();
        $crud->eliminarPorId($documento);


        $total = $crud->contar();
        $msj = "Usuario eliminado, total: " . $total;

        header("Location: ../vistas/web/personas/eliminarPersona.php?msj=$msj");
    }

    public static function modificarP()
    {


        $huella = $_POST['huella'];
        $documento_nuevo = trim($_POST['documento'] ?? '');
        $nombre_nuevo = trim($_POST['nombre'] ?? '');
        $apellido_nuevo = trim($_POST['apellido'] ?? '');
        $email_nuevo = trim($_POST['email'] ?? '');

        $u = new Personas($huella, $documento_nuevo, $nombre_nuevo, $apellido_nuevo, $email_nuevo);

        $crud = new CrudPersonasImp();
        $crud->modificar($u);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ctrlPersona::actuar();
}
