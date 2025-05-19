<?php

class empleados
{
    private $huella;
    private $cargo;
    private $horario;
    private $departamento;

     private $biblioteca_id;

     public function __construct($huella,$cargo, $horario,$departamento)
    {
        $this->huella = $huella;
        $this->cargo = $cargo;
        $this->horario = $horario;
        $this ->departamento = $departamento;

    }
        public function getHuella(){
        return $this->huella;
    }
      public function setHuella($huella){
        $this->huella= $huella;
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