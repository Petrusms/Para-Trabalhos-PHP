<?php
abstract class MaterialLeitura{
    protected int $id;
    protected string $titulo;
    protected int $anoPublicacao;
    protected string $categoria;

    abstract public function getTipo();
    
    /**
     * Get the value of titulo
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of anoPublicacao
     */
    public function getAnoPublicacao(): int
    {
        return $this->anoPublicacao;
    }

    /**
     * Set the value of anoPublicacao
     */
    public function setAnoPublicacao(int $anoPublicacao): self
    {
        $this->anoPublicacao = $anoPublicacao;

        return $this;
    }

    /**
     * Get the value of categoria
     */
    public function getCategoria(): string
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     */
    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
?>