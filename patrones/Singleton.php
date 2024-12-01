<?php

class AnimalRegisto { 
    private static ?AnimalRegisto $instance = null;
 
    private array $animales = [];
 
    private function __construct() {}
 
    private function __clone() {}
 
    public function __wakeup() {
        throw new Exception("Cannot unserialize a singleton.");
    }
 
    public static function getInstance(): AnimalRegisto {
        if (self::$instance === null) {
            self::$instance = new AnimalRegisto();
        }
        return self::$instance;
    }
 
    public function registrarAnimal(string $nombre, string $tipo): void {
        $this->animales[] = [
            'nombre' => $nombre,
            'tipo' => $tipo,
        ];
    }
 
    public function obtenerAnimales(): array {
        return $this->animales;
    }
}
 
try { 
    $registro = AnimalRegisto::getInstance();
 
    $registro->registrarAnimal("Lala ", "Perra");
    $registro->registrarAnimal("Yin ", "Gata");
    $registro->registrarAnimal("Dory ", "Pez");
 
    $animales = $registro->obtenerAnimales();

    echo "Animales Registrados el dia de hoy:<br>";
    foreach ($animales as $animal) {
        echo "Nombre: {$animal['nombre']}, Tipo: {$animal['tipo']}<br>";
    }
 
    $otroRegistro = AnimalRegisto::getInstance();
    echo "¿Misma instancia? " . ($registro === $otroRegistro ? "Siww" : "No");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
