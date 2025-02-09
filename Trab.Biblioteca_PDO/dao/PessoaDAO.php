<?php
require_once("IBiblioteca.php");
require_once("util/Conexao.php");
require_once("modelo/Livro.php");
require_once("modelo/Gibi.php");
require_once("modelo/Revista.php");

class PessoaDAO implements IBiblioteca{

    public function adicionar($ML) {
        $sql = "INSERT INTO Materiais_Leitura(tipo, titulo, anoPublicacao, categoria, numEdicao, editora, numPag, numCap)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $con = Conexao::getCon();
        $stmt = $con->prepare($sql);
        if($ML instanceof Livro){
            $stmt->execute(array($ML->getTipo(), $ML->getTitulo(), $ML->getAnoPublicacao(),$ML->getCategoria(), null, null, $ML->getNumPagina(), $ML->getNumCapitulo()));
        } else if($ML instanceof Gibi){
            $stmt->execute(array($ML->getTipo(), $ML->getTitulo(), $ML->getAnoPublicacao(),$ML->getCategoria(), $ML->getNumEdicao(),null, null, null));
        } else if ($ML instanceof Revista){
            $stmt->execute(array($ML->getTipo(), $ML->getTitulo(), $ML->getAnoPublicacao(),$ML->getCategoria(), $ML->getNumEdicao(), $ML->getEditora(), null, null));
        }
    }

    public function listar() {
        $sql = "SELECT * FROM   Materiais_Leitura";
        $con = Conexao::getCon();

        $stmt = $con->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();
        
        $materiais = $this->MapMateriais($registros);
        if(count($materiais)>0){
            return $materiais;
        }else{
            return null;
        }
    }

    public function buscar($id, $titulo) {
        $sql = "SELECT * FROM   Materiais_Leitura WHERE id = ? AND titulo = ?";
        $con = Conexao::getCon();

        $stmt = $con->prepare($sql);
        $stmt->execute([$id, $titulo]);
        $registros = $stmt->fetchAll();
        
        $materiais = $this->MapMateriais($registros);
        if(count($materiais)>0){
            return $materiais;
        }else{
            return null;
        }
    }
    public function excluir($id, $titulo) {
        $sql = "DELETE FROM Materiais_Leitura WHERE id = ? AND titulo = ?";
        $con = Conexao::getCon();

        $stmt = $con->prepare($sql);
        $stmt->execute([$id, $titulo]);
        $registros = $stmt->fetchAll();
        
        $materiais = $this->MapMateriais($registros);
        if(count($materiais)>0){
            return $materiais;
        }else{
            return null;
        }
    }

    private function MapMateriais(array $registros) {
        $materiais = [];
        foreach ($registros as $reg) {
            if ($reg['tipo'] == 'L') {
                $material = new Livro();
                $material->setNumPagina($reg['numPag']);
                $material->setNumCapitulo($reg['numCap']);
            } else if ($reg['tipo'] == 'G') {
                $material = new Gibi();
                $material->setNumEdicao($reg['numEdicao']);   
            } else if ($reg['tipo'] == 'R') {
                $material = new Revista();
                $material->setNumEdicao($reg['numEdicao']);
                $material->setEditora($reg['editora']);
            } 
            $material->setId($reg['id']);
            $material->setTitulo($reg['titulo']);
            $material->setAnoPublicacao($reg['anoPublicacao']);
            $material->setCategoria($reg['categoria']);
            $materiais[] = $material;
        }
        return $materiais;
    }
    public function listarEmp(){
        $sql = "SELECT * FROM   Emprestimos";
        $con = Conexao::getCon();

        $stmt = $con->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();
        
        if(count($registros)>0){
            foreach($registros as $registro){
                print("ID do Empréstimo: {$registro['id']} | ID do Material: {$registro['material_id']} | Pessoa: {$registro['pessoa']} | Data do Empréstimo: {$registro['data_emprestimo']}\n");
            }
        }else{
            print("Nenhum empréstimo registrado!\n");
        }
    }
    public function listarDoa(){
        $sql = "SELECT * FROM   Doacoes";
        $con = Conexao::getCon();

        $stmt = $con->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();
        
        if(count($registros)>0){
            foreach($registros as $registro){
                print("ID da Doação: {$registro['id']} | ID do Material: {$registro['material_id']} | Pessoa/Instituição: {$registro['pessoa_instituicao']} | Data da Doação: {$registro['data_doacao']}\n");
            }
        }else{
            print("Nenhuma doação registrada!\n");
        }
    }
    public function emprestar($id, $titulo, $pessoaDestino)
    {
        $sql = "INSERT INTO Emprestimos (material_id, pessoa, data_emprestimo) VALUES (?, ?, ?)";
        $con = Conexao::getCon();
        $stmt = $con->prepare($sql);

        $material = $this->buscar($id, $titulo);

        if($material){
            $data_emprestimo = date("Y-m-d");

            $stmt->execute([$id, $pessoaDestino, $data_emprestimo]);
            print("Material emprestado com sucesso para $pessoaDestino!\n");
        } else {
            print("Material com ID $id e título $titulo não encontrado.\n");
        }
    }
    public function doar($id, $titulo, $instituicaoPessoaDestino)
    {
        $sql = "INSERT INTO Doacoes (material_id, pessoa_instituicao, data_doacao) VALUES (?, ?, ?)";
        $con = Conexao::getCon();
        $stmt = $con->prepare($sql);

        $material = $this->buscar($id, $titulo);

        if($material){
            $data_doacao = date("Y-m-d");

            $stmt->execute([$id, $instituicaoPessoaDestino, $data_doacao]);
            print("Material doado com sucesso para $instituicaoPessoaDestino!\n");
        } else {
            print("Material com ID $id e título $titulo não encontrado.\n");
        }
    }
}
?>
