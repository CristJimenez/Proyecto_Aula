<?php
require_once '../modelo/persistencia/CrudBibliotecaImp.php';

class ControladorBiblioteca
{
    public static function actuar ()
    {
        $accion = $_REQUEST['accion'];

        switch ($accion) {

            case 'GUARDAR':

                ControladorBiblioteca::guardar_biblioteca();

                break;
            
            default:

                throw new Exception('Accion incorrecta');
        }
    }

    public static function guardar_biblioteca ()
    {
        $bibliotecaid = $_REQUEST['id'];

        $aforo = $_REQUEST['aforo'];

        $area = $_REQUEST['area'];

        $b = new biblioteca($bibliotecaid, $aforo, $area);

        $crud = new CrudBibliotecaImp();

        $crud->insertar($b);

        $total = $crud->contar();

        $msj = "Biblioteca agregada, Total: ". $total;

        header("Location: ../vistas/web/biblioteca/agregar.php?msj=$msj");
    }
}

ControladorBiblioteca::actuar();
?>