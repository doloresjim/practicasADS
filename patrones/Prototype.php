<?php
 
interface CarroPrototype {
    public function clonar(): CarroPrototype;
}
 
class Carro implements CarroPrototype {
    private string $marca;
    private string $modelo;
    private int $año;
    private string $color;

 
    public function __construct(string $marca, string $modelo, int $año, string $color) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->año = $año;
        $this->color = $color;
    }
 
    public function clonar(): CarroPrototype {
        return clone $this;      }

 
    public function getMarca(): string {
        return $this->marca;
    }

    public function setMarca(string $marca): void {
        $this->marca = $marca;
    }

    public function getModelo(): string {
        return $this->modelo;
    }

    public function setModelo(string $modelo): void {
        $this->modelo = $modelo;
    }

    public function getAño(): int {
        return $this->año;
    }

    public function setAño(int $año): void {
        $this->año = $año;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function setColor(string $color): void {
        $this->color = $color;
    }

 
    public function getDescripcion(): string {
        return "Marca: {$this->marca}, Modelo: {$this->modelo}, Año: {$this->año}, Color: {$this->color}";
    }
}
 
try { 
    $carroOriginal = new Carro("Toyota", "Corolla", 2020, "Azul");
 
    $carroClonado = $carroOriginal->clonar();
 
    $carroClonado->setColor("Rojo platinado");
 
    echo "Carro Original: " . $carroOriginal->getDescripcion() . "<br>";
    echo "Carro Clonado: " . $carroClonado->getDescripcion() . "<br>";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
