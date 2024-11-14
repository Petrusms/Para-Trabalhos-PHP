<?php
class Autor{
    private string $nome;
    private int $dataNascimento;
    private string $nacionalidade;
    private int $QtdTipoPublicados;
    private string $sexo;

    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of dataNascimento
     */
    public function getDataNascimento(): int
    {
        return $this->dataNascimento;
    }

    /**
     * Set the value of dataNascimento
     */
    public function setDataNascimento(int $dataNascimento): self
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get the value of nacionalidade
     */
    public function getNacionalidade(): string
    {
        return $this->nacionalidade;
    }

    /**
     * Set the value of nacionalidade
     */
    public function setNacionalidade(string $nacionalidade): self
    {
        $this->nacionalidade = $nacionalidade;

        return $this;
    }

    /**
     * Get the value of QtdTipoPublicados
     */
    public function getQtdTipoPublicados(): int
    {
        return $this->QtdTipoPublicados;
    }

    /**
     * Set the value of QtdTipoPublicados
     */
    public function setQtdTipoPublicados(int $QtdTipoPublicados): self
    {
        $this->QtdTipoPublicados = $QtdTipoPublicados;

        return $this;
    }

    /**
     * Get the value of sexo
     */
    public function getSexo(): string
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     */
    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }
}
?>