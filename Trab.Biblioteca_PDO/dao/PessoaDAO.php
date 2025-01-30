
<?php
require_once("IBiblioteca.php");
class Pessoa implements IBiblioteca{
    private string $nome;
    private string $dataNascimento;
    private string $CPF;
    private string $telefone;
    private string $senha;
    private array $biblioteca = [];
    private array $emprestimo = [];
    private array $doacao = [];

    public function adicionar($ML) {
        $this->biblioteca[] = $ML;
    }

    public function listar(){
        if (empty($this->biblioteca)) {
            print("Nenhum material de leitura cadastrado.\n");
            return;
        }
        
        $temML = false;

        foreach ($this->biblioteca as $ML) {
            if ($ML instanceof Livro) {
                if (!$temML) {
                    print("════════════════════════════════════════════════ LIVRO ══════════════════════════════════════════════\n");
                    $temML = true;
                }
                print("Título: ".$ML->getTitulo()." | Autor: ".$ML->getAutor()->getNome()." | Gênero: ".$ML->getCategoria()."\n");
            } 
        }

        $temML = false;

        foreach ($this->biblioteca as $ML) {
            if ($ML instanceof Revista) {
                if (!$temML) {
                    print("════════════════════════════════════════════════ REVISTA ══════════════════════════════════════════════\n");
                    $temML = true;
                }
                print("Título: " . $ML->getTitulo() . " | Número de edição: " . $ML->getNumEdicao()." | Editora: ".$ML->getEditora()." | Gênero: ".$ML->getCategoria()."\n");
            } 
        }
        
        $temML = false;

        foreach ($this->biblioteca as $ML) {
            if ($ML instanceof Gibi) {
                if (!$temML) {
                    print("════════════════════════════════════════════════ GIBI ══════════════════════════════════════════════\n");
                    $temML = true;
                }
                print("Título: " . $ML->getTitulo() . " | Número de edição: " . $ML->getNumEdicao() . " | Gênero: ".$ML->getCategoria()."\n");
            }
        }
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
                print("O livro " . $material->getTitulo() . " do autor " . $material->getAutor()->getNome() . 
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
                print("O livro " . $material->getTitulo() . " do autor " . $material->getAutor()->getNome() . 
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
                if ($ML->getTitulo() == $titulo && $ML->getAutor()->getNome() == $autorNumEdicao) {
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
                if ($ML->getTitulo() == $titulo && $ML->getAutor()->getNome() == $autorNumEdicao) {
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
                if ($ML->getTitulo() == $titulo && $ML->getAutor() == $autorNumEdicao) {
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

    public function __construct($a,$b,$c,$d,$e) {
        $this->nome = $a;
        $this->dataNascimento = $b;
        $this->CPF = $c;
        $this->telefone = $d;
        $this->senha = $e;
    }

    public function __toString() {
        return  "════════════════ DADOS DO USUÁRIO ═══════════════\n" .
                "  Nome:            " . $this->getNome() . "\n" .
                "  Data Nascimento: " . $this->getDataNascimento() . "\n" .
                "  CPF:            " . $this->getCpf() . "\n" .
                "  Telefone:       " . $this->getTelefone() . "\n" .
                "  Senha:          " . str_repeat('*', strlen($this->getSenha())) . "\n" .
                "  Quantidade de Materiais de leitura: " . count($this->biblioteca) . "\n" .
                "══════════════════════════════════════════════════\n";
                // strlen é uma função do php que conta o número de caracteres na string, incluindo espaços e caracteres especiais, onde o resultado é retornado como um número inteiro.
                // str_repeat é uma função do php que repete uma string um determinado número de vezes, que nesse caso é o asterisco com o número que o strlen retorna/fornece.
    }

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

    

    /**
     * Get the value of biblioteca
     */
    public function getBiblioteca(): array
    {
        return $this->biblioteca;
    }
}
?>
