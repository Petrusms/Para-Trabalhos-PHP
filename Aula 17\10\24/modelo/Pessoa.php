<?php
require_once("IBiblioteca.php");
class Pessoa{
    private string $nome;
    private string $dataNascimento;
    private string $CPF;
    private string $telefone;
    private string $senha;
    private IBiblioteca $biblioteca;

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
    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }

    /**
     * Set the value of dataNascimento
     */
    public function setDataNascimento(string $dataNascimento): self
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha(): string
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     */
    public function setSenha(string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of CPF
     */
    public function getCPF(): string
    {
        return $this->CPF;
    }

    /**
     * Set the value of CPF
     */
    public function setCPF(string $CPF): self
    {
        $this->CPF = $CPF;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone(): string
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     */
    public function setTelefone(string $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }
}
?>