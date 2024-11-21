<?php
require_once("MaterialLeitura.php");
class Gibi extends MaterialLeitura{
    protected int $numEdicao;

    /**
     * Get the value of numEdicao
     */
    public function getNumEdicao(): int
    {
        return $this->numEdicao;
    }

    /**
     * Set the value of numEdicao
     */
    public function setNumEdicao(int $numEdicao): self
    {
        $this->numEdicao = $numEdicao;

        return $this;
    }
}
?>