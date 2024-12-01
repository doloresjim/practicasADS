<?php
 
abstract class Util {
    abstract public function getDescripcion(): string;
    abstract public function getPrecio(): float;
}
 
class Lapiz extends Util {
    public function getDescripcion(): string {
        return "Lápiz";
    }

    public function getPrecio(): float {
        return 1.00;
    }
}
 
abstract class UtilDecorator extends Util {
    protected $util;

    public function __construct(Util $util) {
        $this->util = $util;
    }

    public function getDescripcion(): string {
        return $this->util->getDescripcion();
    }

    public function getPrecio(): float {
        return $this->util->getPrecio();
    }
}
 
class FundaDecorator extends UtilDecorator {
    public function getDescripcion(): string {
        return $this->util->getDescripcion() . " con funda";
    }

    public function getPrecio(): float {
        return $this->util->getPrecio() + 0.50;   
    }
}
 
class DisenoEspecialDecorator extends UtilDecorator {
    public function getDescripcion(): string {
        return $this->util->getDescripcion() . " con diseño especial";
    }

    public function getPrecio(): float {
        return $this->util->getPrecio() + 1.00;   
    }
}
 
$lapiz = new Lapiz();  
echo "Descripción: " . $lapiz->getDescripcion() . "<br>";
echo "Precio: $" . $lapiz->getPrecio() . "<br>";

echo "<hr>";
 
$lapizConFunda = new FundaDecorator($lapiz);
echo "Descripción: " . $lapizConFunda->getDescripcion() . "<br>";
echo "Precio: $" . $lapizConFunda->getPrecio() . "<br>";

echo "<hr>";

 
$lapizConFundaYDiseno = new DisenoEspecialDecorator($lapizConFunda);
echo "Descripción: " . $lapizConFundaYDiseno->getDescripcion() . "<br>";
echo "Precio: $" . $lapizConFundaYDiseno->getPrecio() . "<br>";

echo "<br>";
echo "Es más caro ya que se va incluyendo tra cosa que aumenta su presio.";

?>
