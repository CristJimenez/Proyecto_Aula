<?php
class biblioteca
{
    //propiedades
    private $bibliotecaid;
    private $aforo;
    private $area;

    //constructor
    public function __construct($bibliotecaid, $aforo, $area)
    {
        $this->bibliotecaid = $bibliotecaid;
        $this->aforo = $aforo;
        $this->area = $area;
    }

    //get y set
    public function getBibliotecaid ()
    {
        return $this->bibliotecaid;
    }

    public function setBibliotecaid ($bibliotecaid)
    {
        return $this->bibliotecaid = $bibliotecaid;
    }

    public function getAforo ()
    {
        return $this->aforo;
    }

    public function setAforo($aforo)
    {
        return $this->aforo = $aforo;
    }

    public function getArea ()
    {
        return $this->area;
    }

    public function setArea ($area)
    {
        return $this->area = $area;
    }
}
?>