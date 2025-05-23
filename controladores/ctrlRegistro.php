<?php
require_once(__DIR__ . "/../modelo/persistencia/CrudRegistroImp.php");
require_once(__DIR__ . "/../modelo/persistencia/CrudPersonasImp.php");

class ctrlRegistro
{



    public static function actuar()
    {

        $accion = $_REQUEST['accion'];

        switch ($accion) {

            case 'Ingresar':
                ctrlRegistro::consultar();
                break;

        }
    }


    public static function consultar()
    {
      

        $huella_persona = $_POST['huella'];
        $crud = new CrudPersonasImp();
        $elemento = $crud->consultarPorHuella($huella_persona);
        if ($elemento) {

            $horaEntra = $_POST['horaEntra'];
            $horaSale = $_POST['horaSale'];
            $huella = $_POST['huella'];
            $codBiblioteca = $_POST['codBiblioteca'];
            $r = new registro($horaEntra, $horaSale, $huella, $codBiblioteca);

            $crud = new CrudRegistroImp();
            $crud->insertar($r);


            $msj = "Bienvenido " . $elemento->getNombres();;
        } else {
            $_SESSION['datos'] = [];
        }

        header("Location: ../vistas/web/acceso/registroAcceso.php?msj=$msj");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ctrlRegistro::actuar();
}