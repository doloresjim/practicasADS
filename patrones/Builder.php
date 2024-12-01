<?php
 
class Tostada {
    private $pan;
    private $mantequilla;
    private $queso;
    private $jamon;

    public function setPan($pan) {
        $this->pan = $pan;
    }

    public function setMantequilla($mantequilla) {
        $this->mantequilla = $mantequilla;
    }

    public function setQueso($queso) {
        $this->queso = $queso;
    }

    public function setJamon($jamon) {
        $this->jamon = $jamon;
    }

    public function mostrar() {
        $descripcion = "Tostada: ";
        $descripcion .= $this->pan ? $this->pan . ", " : "";
        $descripcion .= $this->mantequilla ? "Mantequilla, " : "";
        $descripcion .= $this->queso ? "Queso, " : "";
        $descripcion .= $this->jamon ? "Jamon." : "";
        return $descripcion;
    }
}
 
class TostadaBuilder {
    private $tostada;

    public function __construct() {
        $this->tostada = new Tostada();
    }

    public function agregarPan($pan) {
        $this->tostada->setPan($pan);
        return $this;  
    }

    public function agregarMantequilla() {
        $this->tostada->setMantequilla(true);
        return $this;  
    }

    public function agregarQueso() {
        $this->tostada->setQueso(true);
        return $this;  
    }

    public function agregarJamon() {
        $this->tostada->setJamon(true);
        return $this;  
    }

    public function obtenerTostada() {
        return $this->tostada;
    }
}
 
$tostada1 = (new TostadaBuilder())
    ->agregarPan("Pan integral")
    ->agregarMantequilla()
    ->agregarQueso()
    ->obtenerTostada();

echo $tostada1->mostrar() . "<br>"; 
$tostada2 = (new TostadaBuilder())
    ->agregarPan("Pan blanco")
    ->agregarJamon()
    ->obtenerTostada();

echo $tostada2->mostrar() . "<br>";  

?>
