<?php
 
interface EstadoAgua {
    public function mostrarEstado(): string;
}
 
class AguaSolido implements EstadoAgua {
    public function mostrarEstado(): string {
        return "El agua está en estado sólido.";
    }
}

class AguaLiquido implements EstadoAgua {
    public function mostrarEstado(): string {
        return "El agua está en estado líquido.";
    }
}

class AguaGaseoso implements EstadoAgua {
    public function mostrarEstado(): string {
        return "El agua está en estado gaseoso.";
    }
}
 
class Agua {
    private EstadoAgua $estadoAgua;
 
    public function __construct(EstadoAgua $estadoAgua) {
        $this->estadoAgua = $estadoAgua;
    }
 
    public function cambiarEstado(EstadoAgua $estadoAgua): void {
        $this->estadoAgua = $estadoAgua;
    }
 
    public function mostrarEstado(): string {
        return $this->estadoAgua->mostrarEstado();
    }
} 
$agua = new Agua(new AguaSolido());
echo $agua->mostrarEstado() . "<br>";  
$agua->cambiarEstado(new AguaLiquido());
echo $agua->mostrarEstado() . "<br>";  
$agua->cambiarEstado(new AguaGaseoso());
echo $agua->mostrarEstado() . "<br>"; 
$agua->cambiarEstado(new AguaSolido());
echo $agua->mostrarEstado() . "<br>";  

?>
