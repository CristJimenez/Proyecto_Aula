<?php
session_start();
require_once '../modelo/persistencia/CrudBibliotecaImp.php';
require_once '../modelo/entidades/biblioteca.php';

class ControladorBiblioteca
{
    public static function actuar ()
    {
        $accion = $_REQUEST['accion'];

        switch ($accion) {
            
            case 'CONSULTAR-E':

                ControladorBiblioteca::consultar_biblioteca_e();

                break;
            
            case 'CONSULTAR-M':

                ControladorBiblioteca::consultar_biblioteca_m();

                break;
            
            case 'GUARDAR':

                ControladorBiblioteca::guardar_biblioteca();

                break;
            
            case 'ELIMINAR':

                ControladorBiblioteca::eliminar_biblioteca();

                break;
            
            case 'MODIFICAR':

                ControladorBiblioteca::modificar_biblioteca();

                break;

            default:

                throw new Exception('Accion incorrecta');
        }
    }

    public static function consultar_biblioteca_e ()
    {
        $bibliotecaid = $_REQUEST['id'];

        $crud = new CrudBibliotecaImp();

        try {
            
        $resultado = $crud->consultarPorId($bibliotecaid);

        $id = $resultado->getBibliotecaid();

        $aforo = $resultado->getAforo();

        $area = $resultado->getArea();

        header("Location: ../vistas/web/biblioteca/eliminar.php?id=$id&aforo=$aforo&area=$area");

        } catch (Exception $e) {
            
            $msj = urlencode($e->getMessage());
            
            header("Location: ../vistas/web/biblioteca/eliminar.php?error=$msj");

        }
    }

        public static function consultar_biblioteca_m ()
    {
        $bibliotecaid = $_REQUEST['id'];

        $crud = new CrudBibliotecaImp();

        try {
            
        $resultado = $crud->consultarPorId($bibliotecaid);

        $id = $resultado->getBibliotecaid();

        $aforo = $resultado->getAforo();

        $area = $resultado->getArea();

        header("Location: ../vistas/web/biblioteca/modificar.php?id=$id&aforo=$aforo&area=$area");

        } catch (Exception $e) {
            
            $msj = urlencode($e->getMessage());
            
            header("Location: ../vistas/web/biblioteca/modificar.php?error=$msj");

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

    public static function eliminar_biblioteca ()
    {
        $bibliotecaid = $_REQUEST['id'];

        $crud = new CrudBibliotecaImp();

        $crud->eliminarPorId($bibliotecaid);

        $total = $crud->contar();

        $msjeli = "Biblioteca eliminada, Total: ". $total;

        header("Location: ../vistas/web/biblioteca/eliminar.php?msjeli=$msjeli");
    }

    public static function modificar_biblioteca ()
    {

        $bibliotecaid = $_REQUEST['id'];
        
        $aforo = $_REQUEST['aforo'];

        $area = $_REQUEST['area'];

        $b = new biblioteca($bibliotecaid, $aforo, $area);

        $crud = new CrudBibliotecaImp();

        $crud->modificar($b);
        
        $msjmod = "Biblioteca modificada";

        header("Location: ../vistas/web/biblioteca/modificar.php?msjmod=$msjmod");
    }
}

ControladorBiblioteca::actuar();
?>