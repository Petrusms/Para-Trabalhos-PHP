<?php
require_once("IBiblioteca.php");
require_once("util/Conexao.php");
require_once("modelo/Livro.php");
require_once("modelo/Gibi.php");
require_once("modelo/Revista.php");

class PessoaDAO implements IBiblioteca{
    private array $biblioteca = [];
    private array $emprestimo = [];
    private array $doacao = [];

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

    private function MapMateriais(array $registros) {
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

    public function listarEmprestimo() {
        if (empty($this->emprestimo)) {
            print("Nenhum material de leitura foi emprestado.\n");
            return;
        }
    
        $temML = false;
    
        foreach ($this->emprestimo as $ML) {
            $material = $ML['material'];
    
            if ($material instanceof Livro) {
                if (!$temML) {
                    print("════════════════════════════════════════════════ LIVRO ══════════════════════════════════════════════\n");
                    $temML = true;
                }
                print("O livro " . $material->getTitulo() .
                    " do gênero: " . $material->getCategoria() . 
                    " foi emprestado para " . $ML['pessoa'] . "\n");
            } 
        }
    
        $temML = false;
    
        foreach ($this->emprestimo as $ML) {
            $material = $ML['material'];
    
            if ($material instanceof Revista) {
                if (!$temML) {
                    print("════════════════════════════════════════════════ REVISTA ══════════════════════════════════════════════\n");
                    $temML = true;
                }
                print("A revista " . $material->getTitulo() . 
                    " da edição " . $material->getNumEdicao() . 
                    " do gênero: " . $material->getCategoria() . 
                    " da editora " . $material->getEditora() . 
                    " foi emprestada para " . $ML['pessoa'] . "\n");
            } 
        }
    
        $temML = false;
    
        foreach ($this->emprestimo as $ML) {
            $material = $ML['material'];
    
            if ($material instanceof Gibi) {
                if (!$temML) {
                    print("════════════════════════════════════════════════ GIBI ══════════════════════════════════════════════\n");
                    $temML = true;
                }
                print("O gibi " . $material->getTitulo() . 
                    " da edição " . $material->getNumEdicao() . 
                    " do gênero: " . $material->getCategoria() . 
                    " foi emprestado para " . $ML['pessoa'] . "\n");
            }
        }
    }
    public function listarDoacao(){
        if (empty($this->doacao)) {
            print("Nenhum material de leitura foi doado.\n");
            return;
        }
        
        $temML = false;

        foreach ($this->doacao as $ML) {
            $material = $ML['material'];

            if ($material instanceof Livro) {
                if (!$temML) {
                    print("════════════════════════════════════════════════ LIVRO ══════════════════════════════════════════════\n");
                    $temML = true;
                }
                print("O livro " . $material->getTitulo() .
                    " do gênero: " . $material->getCategoria() . 
                    " foi emprestado para " . $ML['destino'] . "\n");
            } 
        }

        $temML = false;

        foreach ($this->doacao as $ML) {
            $material = $ML['material'];
            if ($material instanceof Revista) {
                if (!$temML) {
                    print("════════════════════════════════════════════════ REVISTA ══════════════════════════════════════════════\n");
                    $temML = true;
                }
                print("A revista " . $material->getTitulo() . 
                " da edição " . $material->getNumEdicao() . 
                " do gênero: " . $material->getCategoria() . 
                " da editora " . $material->getEditora() . 
                " foi emprestada para " . $ML['destino'] . "\n");
            } 
        }
        $temML = false;

        foreach ($this->doacao as $ML) {
            $material = $ML['material'];
            if ($material instanceof Gibi) {
                if (!$temML) {
                    print("════════════════════════════════════════════════ GIBI ══════════════════════════════════════════════\n");
                    $temML = true;
                }
                print("O gibi " . $material->getTitulo() . 
                    " da edição " . $material->getNumEdicao() . 
                    " do gênero: " . $material->getCategoria() . 
                    " foi emprestado para " . $ML['destino'] . "\n");
            }
        }
    }

    public function excluir($titulo, $autorNumEdicao, $editora) {
        if (empty($this->biblioteca)) {
            return ["success" => false, "message" => "Nenhum material de leitura cadastrado para ser excluído.\n"];
        }
    
        foreach ($this->biblioteca as $key => $ML) {
            if ($ML instanceof Livro) {
                if ($ML->getTitulo() == $titulo) {
                    array_splice($this->biblioteca, $key, 1);
                    return ["success" => true, "message" => "O livro " . $titulo . " foi excluído com sucesso.\n"];
                }
            }
            if ($ML instanceof Gibi) {
                if ($ML->getTitulo() == $titulo && $ML->getNumEdicao() == $autorNumEdicao) {
                    array_splice($this->biblioteca, $key, 1);
                    return ["success" => true, "message" => "O gibi " . $titulo . " foi excluído com sucesso.\n"];
                }
            }
            if ($ML instanceof Revista) {
                if ($ML->getTitulo() == $titulo && $ML->getNumEdicao() == $autorNumEdicao && $ML->getEditora() == $editora) {
                    array_splice($this->biblioteca, $key, 1);
                    return ["success" => true, "message" => "A revista " . $titulo . " foi excluída com sucesso.\n"];
                }
            }
        }
        return ["success" => false, "message" => $titulo . " não encontrado.\n"];
    }

    public function emprestar($titulo, $autorNumEdicao, $editora, $pessoaDestino) {
        if (empty($this->biblioteca)) {
            print("Nenhum material de leitura cadastrado para ser emprestado.\n");
            return;
        }

        
        foreach ($this->biblioteca as $key => $ML) {
            if ($ML instanceof Livro) {
                if ($ML->getTitulo() == $titulo) {
                    $this->emprestimo[] = [
                        'material' => $ML,
                        'pessoa' => $pessoaDestino
                    ];
                    print("O livro ".$titulo." do autor ".$autorNumEdicao . " foi emprestado para ".$pessoaDestino." com sucesso.\n");
                    $this->excluir($titulo, $autorNumEdicao, $editora);
                    return;
                }
            }
            if ($ML instanceof Gibi) {
                if ($ML->getTitulo() == $titulo && $ML->getNumEdicao() == $autorNumEdicao) {
                    $this->emprestimo[] = [
                        'material' => $ML,
                        'pessoa' => $pessoaDestino
                    ];
                    print("O gibi ".$titulo." da edição " . $autorNumEdicao . " foi emprestado para ".$pessoaDestino." com sucesso.\n");
                    $this->excluir($titulo, $autorNumEdicao, $editora);
                    return;
                }
            }
            if ($ML instanceof Revista) {
                if ($ML->getTitulo() == $titulo && $ML->getNumEdicao() == $autorNumEdicao && $ML->getEditora() == $editora) {
                    $this->emprestimo[] = [
                        'material' => $ML,
                        'pessoa' => $pessoaDestino
                    ];
                    print("A revista ".$titulo." da editora ".$editora." foi emprestada para ".$pessoaDestino." com sucesso.\n");
                    $this->excluir($titulo, $autorNumEdicao, $editora);
                    return;
                }
            }
        }
        print("Material " . $titulo . " não encontrado na sua biblioteca.\n");
    }

    public function doar($titulo, $autorNumEdicao, $editora, $instituicaoPessoaDestino) {
        if (empty($this->biblioteca)) {
            print("Nenhum material de leitura cadastrado para ser doado.\n");
            return;
        }

        $materialEncontrado = false;
            
        foreach ($this->biblioteca as $key => $ML) {
            if ($ML instanceof Livro) {
                if ($ML->getTitulo() == $titulo) {
                    $this->doacao[] = [
                        'material' => $this->biblioteca[$key],
                        'destino' => $instituicaoPessoaDestino
                    ];
                    print("O livro ".$titulo." do autor ".$autorNumEdicao." foi doado para ".$instituicaoPessoaDestino." com sucesso.\n");
                    $this->excluir($titulo, $autorNumEdicao, $editora);
                    $materialEncontrado = true;
                    return;
                }
            }
            if ($ML instanceof Gibi) {
                if ($ML->getTitulo() == $titulo && $ML->getNumEdicao() == $autorNumEdicao) {
                    $this->doacao[] = [
                        'material' => $this->biblioteca[$key],
                        'destino' => $instituicaoPessoaDestino
                    ];
                    print("O gibi ".$titulo." da edição ".$autorNumEdicao." foi doado para ".$instituicaoPessoaDestino." com sucesso.\n");
                    $materialEncontrado = true;
                    $this->excluir($titulo, $autorNumEdicao, $editora);
                    return;
                }
            }
            if ($ML instanceof Revista) {
                if ($ML->getTitulo() == $titulo && $ML->getNumEdicao() == $autorNumEdicao && $ML->getEditora() == $editora) {
                    $this->doacao[] = [
                        'material' => $this->biblioteca[$key],
                        'destino' => $instituicaoPessoaDestino
                    ];
                    print("A revista ".$titulo." da editora ".$editora." foi doado para ".$instituicaoPessoaDestino." com sucesso.\n");
                    $materialEncontrado = true;
                    $this->excluir($titulo, $autorNumEdicao, $editora);
                    return;
                }
            }
        }
        if (!$materialEncontrado) {
            print("Material " . $titulo . " não encontrado na sua biblioteca.\n");
        }
    }
}
?>
