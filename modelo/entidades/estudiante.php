<?php

class estudiante
{

    //propiedades
    private $huella_estudiante;
    private $estado;
    private $carrera;
    private $semestre;
    

    public function __construct($huella_estudiante, $estado, $carrera, $semestre, )
    {
        $this->huella_estudiante = $huella_estudiante;
        $this->estado = $estado;
        $this->carrera = $carrera;
        $this->semestre = $semestre;
       
    }

    public function getHuella_estudiante()
    {
        return $this->huella_estudiante;
    }

    public function setHuella_estudiante($huella_estudiante)
    {
        return $this->huella_estudiante = $huella_estudiante;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        return $this->estado = $estado;
    }

    public function getCarrera()
    {
        return $this->carrera;
    }

    public function setCarrera($carrera)
    {
        return $this->carrera = $carrera;
    }

    public function getSemestre()
    {
        return $this->semestre;
    }

    public function setSemestre($semestre)
    {
        return $this->semestre = $semestre;
    }



}

?>