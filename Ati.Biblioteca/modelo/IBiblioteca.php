<?php
interface IBiblioteca{
    public function listar();
    public function excluir($titulo, $autorNumEdicao);
    public function adicionar($ML);
    public function emprestar($titulo, $pessoaDestino);
    public function doar($titulo, $autor);
}
?>