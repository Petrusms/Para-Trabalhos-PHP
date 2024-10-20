<?php
require_once("modelo/IConsumidorEnergia.php");

class Industrial implements IConsumidorEnergia{

    private int $consumo;
    
    public function getValorFatura(){
        if($this->consumo>500){
            $excesso = $this->consumo - 500;
            return 500*1.8 + $excesso*2.30;
        }else{
            return $this->consumo*1.8;
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