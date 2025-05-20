<?php


class estudiante
{

    //propiedades
    private $huella_persona;
    private $estadoActivo;
    private $CARRERA;
    private $semestre;
    

    public function __construct($huella_persona, $estadoActivo, $CARRERA, $semestre)
    {
        $this->huella_persona = $huella_persona;
        $this->estadoActivo = $estadoActivo;
        $this->CARRERA = $CARRERA;
        $this->semestre = $semestre;
       
    }

    public function getHuella_persona()
    {
        return $this->huella_persona;
    }

    public function setHuella_persona($huella_persona)
    {
        return $this->huella_persona = $huella_persona;
    }

    public function getEstadoActivo()
    {
        return $this->estadoActivo;
    }

    public function setEstadoActivo($estadoActivo)
    {
        return $this->estadoActivo = $estadoActivo;
    }

    public function getCARRERA()
    {
        return $this->CARRERA;
    }

    public function setCARRERA($CARRERA)
    {
        return $this->CARRERA = $CARRERA;
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