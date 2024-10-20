<?php
require_once("modelo/IConsumidorEnergia.php");

class Comercial implements IConsumidorEnergia{

    private int $consumo;
    
    public function getValorFatura(){
        if($this->consumo>100){
            $excesso = $this->consumo - 100;
            return ((100*1.45) + ($excesso*1.6));
        }else{
            return $this->consumo*1.45;
        }
    }
    /**
     * Get the value of consumo
     */
    public function getConsumo(): int
    {
        return $this->consumo;
    }

    /**
     * Set the value of consumo
     */
    public function setConsumo(int $consumo): self
    {
        $this->consumo = $consumo;

        return $this;
    }
}
?>