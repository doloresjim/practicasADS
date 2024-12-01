<?php
 
interface PlantaCliente {
    public function getDescripcion(): string;
}
 
class Planta {
    private string $nombre;
    private string $tipo;
    private float $tamano;

    public function __construct(string $nombre, string $tipo, float $tamano) {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->tamano = $tamano;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function getTamano(): string {
        return $this->tamano;
    }
}
 
class PlantaAdapter implements PlantaCliente {
    private Planta $planta;

    public function __construct(Planta $planta) {
        $this->planta = $planta;
    }
 
    public function getDescripcion(): string {
        return "Planta: " . $this->planta->getNombre() . ", Tipo: " . $this->planta->getTipo() . ", Tamaño: " . $this->planta->getTamano() . " metros";
    }
}
 
$planta = new Planta("Flor de loto", "Flor", 0.48);
$plantaAdaptada = new PlantaAdapter($planta);

echo $plantaAdaptada->getDescripcion(); 
?>
