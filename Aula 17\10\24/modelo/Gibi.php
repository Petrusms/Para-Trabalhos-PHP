<?php
require_once("MaterialLeitura.php");
class Gibi extends MaterialLeitura{
    protected string $numEdicao;

    public function doar(){
        
    }

    /**
     * Get the value of numEdicao
     */
    public function getNumEdicao(): string
    {
        return $this->numEdicao;
    }

    /**
     * Set the value of numEdicao
     */
    public function setNumEdicao(string $numEdicao): self
    {
        $this->numEdicao = $numEdicao;

        return $this;
    }
}
?>