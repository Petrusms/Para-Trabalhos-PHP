<?php
interface IBiblioteca{
    public function listar();
    public function excluir($titulo, $autorNumEdicao, $editora);
    public function adicionar($ML);
    public function emprestar($titulo, $autorNumEdicao, $editora,$pessoaDestino);
    public function doar($titulo, $autorNumEdicao, $editora, $instituicaoPessoaDestino);
}
?>
