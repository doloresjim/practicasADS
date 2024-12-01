<?php
 
abstract class Libro { 
    public function procesarLibro(): string {
        $descripcion = $this->preparar();
        $descripcion .= $this->encuadernar();
        $descripcion .= $this->distribuir();
        return $descripcion;
    }
 abstract protected function preparar(): string;
 protected function encuadernar(): string {
        return "Encuadernando el libro.<br>";
    }
 protected function distribuir(): string {
        return "Distribuyendo el libro.<br>";
    }
}
 
class LibroDeFiccion extends Libro {
         protected function preparar(): string {
        return "Preparando un libro de ficción, creando personajes y trama siw.<br>";
    }
}

class LibroDeCiencia extends Libro {
     
    protected function preparar(): string {
        return "Preparando un libro de ciencia, investigando datos y teorías noo aburrido.<br>";
    }
}
 
$libroFiccion = new LibroDeFiccion();
echo $libroFiccion->procesarLibro();  
echo "<br>";
 
$libroCiencia = new LibroDeCiencia();
echo $libroCiencia->procesarLibro();  

?>
