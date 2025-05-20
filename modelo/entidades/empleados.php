<?php

class empleados
{
    private $huella_persona;
    private $cargo;
    private $horario;
    private $departamento;

     private $biblioteca_id;

     public function __construct($huella_persona,$cargo, $horario,$departamento)
    {
        $this->huella_persona = $huella_persona;
        $this->cargo = $cargo;
        $this->horario = $horario;
        $this ->departamento = $departamento;

    }
        public function getHuella(){
        return $this->huella_persona;
    }
      public function setHuella($huella_persona){
        $this->huella_persona= $huella_persona;
    }

        public function getCargo(){
        return $this->cargo;
    }

      public function setCargo($cargo){
        $this->cargo= $cargo;
    }

        public function getHorario(){
        return $this->horario;
    }

      public function setHorario($horario){
        $this->horario= $horario;
    }

        public function getDepartamento(){
        return $this->departamento;
    }
      public function setDepartamento($departamento){
        $this->departamento= $departamento;
    }
        public function getBiblioteca_id()
    {
        return $this->biblioteca_id;
    }

    public function setBiblioteca_id($biblioteca_id)
    {
        return $this->biblioteca_id = $biblioteca_id;
    }

}