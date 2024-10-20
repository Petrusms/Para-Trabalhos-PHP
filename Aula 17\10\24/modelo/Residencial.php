<?php
require_once("modelo/IConsumidorEnergia.php");

class Residencial implements IConsumidorEnergia{

    private int $consumo;

    public function getValorFatura(){
        return $this->consumo*1.05;
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