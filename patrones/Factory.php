<?php

interface Libro {
    public function getDescription(): string;
}
 
class RomanceLibro implements Libro {
    public function getDescription(): string {
        return "Un libro de romance es para adolecentes.";
    }
}

class DarkRomanceLibro implements Libro {
    public function getDescription(): string {
        return "Un libro de dark romance es para publico mas adulto ya que trata temas no aptos para todo el publico.";
    }
}

class FantasiaLibro implements Libro {
    public function getDescription(): string {
        return "Un libro de fantasía con mundos mágicos y criaturas extraordinarias.";
    }
}
 
class LibroFactory {
    public static function createLibro(string $genre): Libro {
        switch (strtolower($genre)) {
            case "romance":
                return new RomanceLibro();
            case "dark romance":
                return new DarkRomanceLibro();
            case "fantacia":
                return new FantasiaLibro();
            default:
                throw new Exception("Género de libro desconocido.");
        }
    }
}
 
try { 
    $romanceLibro = LibroFactory::createLibro("romance");
    echo $romanceLibro->getDescription(); 

    echo "<br>";
 
    $darkromanceLibro = LibroFactory::createLibro("dark romance");
    echo $darkromanceLibro->getDescription(); 

    echo "<br>";
 
    $fantasiaLibro = LibroFactory::createLibro("fantacia");
    echo $fantasiaLibro->getDescription(); 
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
