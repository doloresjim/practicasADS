<?php
 
interface Observador {
    public function actualizar(string $sabor): void;
}

 class TiendaDeGelatinas {
    private array $observadores = [];
 
    public function agregarObservador(Observador $observador): void {
        $this->observadores[] = $observador;
    }
 
    public function eliminarObservador(Observador $observador): void {
        $this->observadores = array_filter($this->observadores, fn($obs) => $obs !== $observador);
    }

     
    public function notificarObservadores(string $sabor): void {
        foreach ($this->observadores as $observador) {
            $observador->actualizar($sabor);
        }
    }
 
    public function agregarSabor(string $sabor): void {
        echo "Nuevo sabor de gelatina disponible: " . $sabor . "<br>";
         
        $this->notificarObservadores($sabor);
    }
}
 
class Cliente implements Observador {
    private string $nombre;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

     
    public function actualizar(string $sabor): void {
        echo $this->nombre . " ha sido notificado del nuevo sabor de gelatina: " . $sabor . "<br>";
    }
}
 
$tienda = new TiendaDeGelatinas();

 
$cliente1 = new Cliente("Dolores");
$cliente2 = new Cliente("Ilenko");
$cliente3 = new Cliente("James");
 
$tienda->agregarObservador($cliente1);
$tienda->agregarObservador($cliente2);
$tienda->agregarObservador($cliente3);
 
$tienda->agregarSabor("Mazaopan");

echo "<hr>";

 $tienda->eliminarObservador($cliente2);
 
$tienda->agregarSabor("Uva");

?>
