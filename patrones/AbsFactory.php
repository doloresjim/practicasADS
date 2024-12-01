<?php
interface Libro {
    public function getDescription(): string;
}
 
class RomanceLibro implements Libro {
    public function getDescription(): string {
        return "Un libro de romance para adolescentes.";
    }
}

class DarkRomanceLibro implements Libro {
    public function getDescription(): string {
        return "Un libro de dark romance, destinado a un público más adulto.";
    }
}

class FantasyLibro implements Libro {
    public function getDescription(): string {
        return "Un libro de fantasía con mundos mágicos y criaturas extraordinarias.";
    }
}
 
interface LibroFactory {
    public function createRomanceLibro(): Libro;
    public function createDarkRomanceLibro(): Libro;
    public function createFantasyLibro(): Libro;
}
 
class GeneroLibroFactory implements LibroFactory {
    public function createRomanceLibro(): Libro {
        return new RomanceLibro();
    }

    public function createDarkRomanceLibro(): Libro {
        return new DarkRomanceLibro();
    }

    public function createFantasyLibro(): Libro {
        return new FantasyLibro();
    }
}
 
class Cliente {
    private LibroFactory $libroFactory;

    public function __construct(LibroFactory $libroFactory) {
        $this->libroFactory = $libroFactory;
    }

    public function mostrarLibros() { 
        $romance = $this->libroFactory->createRomanceLibro();
        echo $romance->getDescription() . "<br>";

        $darkRomance = $this->libroFactory->createDarkRomanceLibro();
        echo $darkRomance->getDescription() . "<br>";

        $fantasy = $this->libroFactory->createFantasyLibro();
        echo $fantasy->getDescription() . "<br>";
    }
}
 
try { 
    $libroFactory = new GeneroLibroFactory();
 
    $cliente = new Cliente($libroFactory);
    $cliente->mostrarLibros();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
