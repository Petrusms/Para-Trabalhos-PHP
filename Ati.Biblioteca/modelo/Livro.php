<?php
require_once("MaterialLeitura.php");
require_once("Autor.php");
class Livro extends MaterialLeitura{
    private int $numPagina;  
    private int $numCapitulo;
    private Autor $autor;  

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

    /**
     * Get the value of autor
     */
    public function getAutor(): autor
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     */
    public function setAutor(autor $autor): self
    {
        $this->autor = $autor;

        return $this;
    }
}
?>