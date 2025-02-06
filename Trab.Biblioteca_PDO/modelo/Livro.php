<?php
require_once("MaterialLeitura.php");
class Livro extends MaterialLeitura{
    private int $numPagina;  
    private int $numCapitulo; 

    public function getTipo(){
        return "L";
    }

    /**
     * Get the value of numPagina
     */
    public function getNumPagina(): int
    {
        return $this->numPagina;
    }

    /**
     * Set the value of numPagina
     */
    public function setNumPagina(int $numPagina): self
    {
        $this->numPagina = $numPagina;

        return $this;
    }

    /**
     * Get the value of numCapitulo
     */
    public function getNumCapitulo(): int
    {
        return $this->numCapitulo;
    }

    /**
     * Set the value of numCapitulo
     */
    public function setNumCapitulo(int $numCapitulo): self
    {
        $this->numCapitulo = $numCapitulo;

        return $this;
    }
}
?>