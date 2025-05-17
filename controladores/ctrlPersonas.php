<?php

    require_once "../modelo/persistencia/CrudPersonasImp.php";
    
   class ctrlPersonas{
    public static function actuar(){
        $accion = $_REQUEST['accion'];
        

        switch($accion){
            case 'Guardar':

            ctrlPersonas::guardar_persona();
            break;
            default:

            throw new Exception('Accion incorrecta');

        }
    }

    public static function guardar_persona(){

        $huella = @$_REQUEST['huella'];
        $documento = @$_REQUEST['cc'];
        $nombre = @$_REQUEST['nombre'];
        $apellido = @$_REQUEST['apellido'];
        $email = @$_REQUEST['email'];

        $u = new Personas($huella,$documento,$nombre,$apellido,$email);

        $u->setHuella($huella);
        $u->setDocumento($documento);
        $u->setNombres($nombre);
        $u->setApellidos($apellido);
        $u->setEmail($email);

        $crud = new CrudPersonasImp();

        $crud->insertar($u);

        $total = $crud->contar();

        $msj = "Usuario agregado, total: " . $total;

        header("Location: ../vistas/web/personas/addPersonas.php?msj=$msj");

      }
}
   
ctrlPersonas::actuar();

?>