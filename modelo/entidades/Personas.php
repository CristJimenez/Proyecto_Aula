<?php 
class Personas{

    //Propiedades
    private $huella;
    private $documento;
    private $nombres;
    private $apellidos;
    private $email;

    //constructor de la clase personas
    public function __construct($huella,$documento, $nombres,$apellidos,$email)
    {
        $this->huella = $huella;
        $this->documento = $documento;
        $this->nombres = $nombres;
        $this-> apellidos = $apellidos;
        $this -> email = $email;

    }

    // SET y GET
    
    public function getHuella(){
        return $this->huella;
    }

    public function setHuella($huella){
        $this->huella= $huella;
    }
    public function getDocumento(){
        return $this->documento;
    }

    public function setDocumento($documento){
        $this->documento= $documento;
    }
    public function getNombres(){
        return $this->nombres;
    }

    public function setNombres($nombres){
        $this->nombres= $nombres;
    }
    public function getApellidos(){
        return $this->apellidos;
    }

    public function setApellidos($apellidos){
        $this->apellidos= $apellidos;
    }
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email= $email;
    }


}


?>