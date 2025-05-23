<?php 

class registro{

    private $horaEntra;
    private $horaSale;
    private $huella_persona;
    private $codBiblioteca;

    public function __construct($horaEntra,$horaSale,$huella_persona,$codBiblioteca)
    {
        $this->horaEntra = $horaEntra;
        $this->horaSale = $horaSale;
        $this->huella_persona = $huella_persona;
        $this->codBiblioteca = $codBiblioteca;
    }

        // SET y GET
    
    public function getHoraEntra(){
        return $this->horaEntra;
    }

    public function setHoraEntra($horaEntra){
        $this->horaEntra= $horaEntra;
    }
    public function getHoraSale(){
        return $this->horaSale;
    }

    public function setHoraSale($horaSale){
        $this->horaSale= $horaSale;
    }
    public function getHuella_persona(){
        return $this->huella_persona;
    }

    public function setHuella_persona($huella_persona){
        $this->huella_persona= $huella_persona;
    }
    public function getCodBiblioteca(){
        return $this->codBiblioteca;
    }

    public function setCodBiblioteca($codBiblioteca){
        $this->codBiblioteca= $codBiblioteca;
    }

}

?>