<?php
 
interface RellenoEstrategia {
    public function preparar(): string;
}
 
class RellenoDeCarne implements RellenoEstrategia {
    public function preparar(): string {
        return "Preparando una torta con relleno de carne mmm yomi yomi.";
    }
}

class RellenoDePollo implements RellenoEstrategia {
    public function preparar(): string {
        return "Preparando una torta con relleno de pollo mmm yomi yomi.";
    }
}

class RellenoVegetariano implements RellenoEstrategia {
    public function preparar(): string {
        return "Preparando una torta con relleno vegetariano mmm yomi yomi.";
    }
}
 
class Torta {
    private RellenoEstrategia $rellenoEstrategia;
 
    public function __construct(RellenoEstrategia $rellenoEstrategia) {
        $this->rellenoEstrategia = $rellenoEstrategia;
    }
 
    public function cambiarRelleno(RellenoEstrategia $rellenoEstrategia): void {
        $this->rellenoEstrategia = $rellenoEstrategia;
    }
 
    public function prepararTorta(): string {
        return $this->rellenoEstrategia->preparar();
    }
}
 
$torta = new Torta(new RellenoDeCarne());
echo $torta->prepararTorta() . "<br>";  
$torta->cambiarRelleno(new RellenoDePollo());
echo $torta->prepararTorta() . "<br>";  
$torta->cambiarRelleno(new RellenoVegetariano());
echo $torta->prepararTorta() . "<br>"; 

?>
