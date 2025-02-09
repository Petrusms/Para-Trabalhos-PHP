<?php
interface IBiblioteca{
    public function adicionar($ML);
    public function listar();
    public function buscar($id, $titulo);
    public function excluir($id, $titulo);
    public function emprestar($id, $titulo, $pessoaDestino);
    public function doar($id, $titulo, $instituicaoPessoaDestino);
}
?>
