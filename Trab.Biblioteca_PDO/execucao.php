<?php
require_once("dao/IBiblioteca.php");
require_once("modelo/Livro.php");
require_once("modelo/Gibi.php");
require_once("modelo/Revista.php");
require_once("dao/PessoaDAO.php");
require_once("util/Conexao.php");
$con = Conexao::getCon();

$pessoa = new PessoaDao;

function escrever($registros){
    if ($registros != null) {
        foreach($registros as $dados){
            if($dados->getTipo == "L"){
                print("Tipo: Livro | ID: {$dados->getId()} | Título: {$dados->getTitulo()} | Ano de Publicação: {$dados->getAnoPublicacao()} | 
                Categoria: {$dados->getCategoria()} | Núm de Páginas: {$dados->getNumPagina()} | Núm de Capítulos: {$dados->getNumCapitulo()}\n");
            } else if($dados->getTipo == "G"){
                print("Tipo: Livro | ID: {$dados->getId()} | Título: {$dados->getTitulo()} | Ano de Publicação: {$dados->getAnoPublicacao()} |  
                Edição Nº{$dados -> getNumEdicao()}\n");                                       
            } else if($dados->getTipo == "R"){   
                print("Tipo: Livro | ID: {$dados->getId()} | Título: {$dados->getTitulo()} | Ano de Publicação: {$dados->getAnoPublicacao()} |  
                Edição Nº{$dados -> getNumEdicao()} | Editora: {$dados -> getEditora()}\n"); 
            } 
        }                   
    }                                 
}

    while(true){
        print("╔═══════════════════════════════ SEJA BEM VINDO ═════════════════════════════╗\n");
        print("║   Olá, seja bem-vindo à sua biblioteca, escolha uma das opções abaixo:     ║\n");
        print("║                                1: Inserir                                  ║\n");
        print("║                                2: Listar                                   ║\n");
        print("║                                3: Excluir                                  ║\n");
        print("║                                4: Emprestar                                ║\n");
        print("║                                5: Doar                                     ║\n");
        print("║                                0: Sair                                     ║\n");
        print("╚════════════════════════════════════════════════════════════════════════════╝\n");
    
        $opcao = readline("");
        switch($opcao){
            case 1:
                print("╔═════════════════════════ INSERIR ═══════════════════════╗\n");
                print("║ Qual o tipo do material de leitura que será adicionado: ║\n");
                print("║                                                         ║\n");
                print("║                        1: Livro                         ║\n");
                print("║                        2: Gibi                          ║\n");
                print("║                        3: Revista                       ║\n");
                print("╚═════════════════════════════════════════════════════════╝\n");
                $opcao = readline("");
                switch($opcao){
                    case 1:
                        $ML = new Livro();
                        $ML->setTitulo(readline("Qual o titulo desse livro?"))
                        ->setAnoPublicacao(readline("Qual o ano de publicação desse livro?"))
                        ->setCategoria(readline("Qual o gênero desse livro?"));
                        $ML->setNumPagina(readline("Quantas páginas o livro possuie?"))
                        ->setNumCapitulo(readline("Quantas cáptulos o livro possuie?"));

                        $pessoa->adicionar($ML);
                        break;

                    case 2:
                        $ML = new Gibi();
                        $ML->setTitulo(readline("Qual o titulo desse gibi?"))
                        ->setAnoPublicacao(readline("Qual o ano de publicação desse gibi?"))
                        ->setCategoria(readline("Qual o gênero desse gibi?"));
                        $ML->setNumEdicao(readline("Qual o número de edição desse gibi?"));

                        $pessoa->adicionar($ML);
                        break;
                    case 3:
                        $ML = new Revista();
                        $ML->setTitulo(readline("Qual o titulo dessa revista?"))
                        ->setAnoPublicacao(readline("Qual o ano de publicação dessa revista?"))
                        ->setCategoria(readline("Qual o gênero dessa revista?"));
                        $ML->setNumEdicao(readline("Qual o número de edição dessa revista?"));
                        $ML->setEditora(readline("Qual a editora dessa revista?"));

                        $pessoa->adicionar($ML);
                        break;

                    default: 
                        print("╔════════════════!!!════════════════╗\n");
                        print("║ Desculpe, mas a opção é invalida! ║\n");
                        print("╚═══════════════════════════════════╝\n");
                    }
                    break;
            case 2:
                print("╔══════════════════════════════════════════════════════════════════════════════╗\n");
                print("║                                LISTAR MATERIAL                               ║\n");
                print("╠══════════════════════════════════════════════════════════════════════════════╣\n");
                print("║                         Escolha uma das opções abaixo:                       ║\n");
                print("║                                                                              ║\n");
                print("║                                 1: Listar tudo                               ║\n");
                print("║                                 2: Listar empréstimos                        ║\n");
                print("║                                 3: Listar doações                            ║\n");
                print("╚══════════════════════════════════════════════════════════════════════════════╝\n");
                $opcao = readline("");
                switch($opcao){
                    case 1:
                        $registros = $pessoa->listar();
                        if(empty($registros)){
                            print("Nenhum Material cadrastado!!\n");
                        }else{
                            escrever($registros);
                        }
                        break;
                    case 2:
                        $pessoa->listarEmprestimo();
                        break;
                    case 3:
                        $pessoa->listarDoacao();
                        break;
                    default: 
                        print("╔════════════════!!!════════════════╗\n");
                        print("║ Desculpe, mas a opção é invalida! ║\n");
                        print("╚═══════════════════════════════════╝\n");
                }
                break;
    
            case 3:
                print("╔═════════════════════════ EXCLUIR ═════════════════════╗\n");
                print("║ Qual o tipo do material de leitura que será excluido: ║\n");
                print("║                                                       ║\n");
                print("║                       1: Livro                        ║\n");
                print("║                       2: Gibi                         ║\n");
                print("║                       3: Revista                      ║\n");
                print("╚═══════════════════════════════════════════════════════╝\n");
                $opcao = readline("");
                switch($opcao){
                    case 1:
                        $titulo = readline("Qual o titulo do livro?");
                        $autor = readline("Qual o nome do autor desse livro?");
                        $resultado = $pessoa->excluir($titulo, $autor, null);
                        print($resultado["message"]);
                        break;

                    case 2:
                        $titulo = readline("Qual o titulo do gibi?");
                        $numEdicao = readline("Qual o número de edição desse gibi?");
                        $resultado = $pessoa->excluir( $titulo, $numEdicao, null);
                        print($resultado["message"]);
                        break;

                    case 3:
                        $titulo = readline("Qual o titulo da revista?");
                        $numEdicao = readline("Qual o número de edição dessa revista?");
                        $editora = readline("Qual a editora dessa revista?");
                        $resultado = $pessoa->excluir( $titulo, $numEdicao, $editora);
                        print($resultado["message"]);
                        break;

                    default: 
                        print("╔════════════════!!!════════════════╗\n");
                        print("║ Desculpe, mas a opção é invalida! ║\n");
                        print("╚═══════════════════════════════════╝\n");
                }
                break;

            case 4:
                print("╔══════════════════════════ EMPRESTAR ══════════════════════╗\n");
                print("║  Qual o tipo do material de leitura que será emprestado:  ║\n");
                print("║                                                           ║\n");
                print("║                         1: Livro                          ║\n");
                print("║                         2: Gibi                           ║\n");
                print("║                         3: Revista                        ║\n");
                print("╚═══════════════════════════════════════════════════════════╝\n");
                $opcao = readline("");
                switch($opcao){
                    case 1:
                        $titulo = readline("Qual o titulo do livro?");
                        $autor = readline("Qual o nome do autor desse livro?");
                        $pessoaDestino = readline("Para qual pessoa deseja/ira emprestar esse livro?");
                        $pessoa->emprestar($titulo, $autor, null,$pessoaDestino);
                        break;

                    case 2:
                        $titulo = readline("Qual o titulo do gibi?");
                        $numEdicao = readline("Qual o número de edição desse gibi?");
                        $pessoaDestino = readline("Para qual pessoa deseja/ira emprestar esse gibi?");
                        $pessoa->emprestar($titulo, $numEdicao, null, $pessoaDestino);
                        break;

                    case 3:
                        $titulo = readline("Qual o titulo da revista?");
                        $numEdicao = readline("Qual o número de edição dessa revista?");
                        $editora = readline("Qual a editora dessa revista?");
                        $pessoaDestino = readline("Para qual pessoa deseja/ira emprestar essa revista?");
                        $pessoa->emprestar($titulo, $numEdicao, $editora,$pessoaDestino);
                        break;

                    default: 
                        print("╔════════════════!!!════════════════╗\n");
                        print("║ Desculpe, mas a opção é invalida! ║\n");
                        print("╚═══════════════════════════════════╝\n");
                }
                break;

            case 5:
                print("╔═════════════════════════ Doar ═════════════════════╗\n");
                print("║ Qual o tipo do material de leitura que será doado: ║\n");
                print("║                                                    ║\n");
                print("║                      1: Livro                      ║\n");
                print("║                      2: Gibi                       ║\n");
                print("║                      3: Revista                    ║\n");
                print("╚════════════════════════════════════════════════════╝\n");
                $opcao = readline("");
                switch($opcao){
                    case 1:
                        $titulo = readline("Qual o titulo do livro?");
                        $autor = readline("Qual o nome do autor desse livro?");
                        $instituicaoPessoaDestino = readline("Para qual pessoa/instituição deseja doar esse livro?");
                        $pessoa->doar($titulo, $autor, null, $instituicaoPessoaDestino);
                        break;

                    case 2:
                        $titulo = readline("Qual o titulo do gibi?");
                        $numEdicao = readline("Qual o número de edição desse gibi?");
                        $instituicaoPessoaDestino = readline("Para qual pessoa/instituição deseja doar esse gibi?");
                        $pessoa->doar($titulo, $numEdicao, null, $instituicaoPessoaDestino);
                        break;

                    case 3:
                        $titulo = readline("Qual o titulo da revista?");
                        $numEdicao = readline("Qual o número de edição dessa revista?");
                        $editora = readline("Qual a editora dessa revista?");
                        $instituicaoPessoaDestino = readline("Para qual pessoa/instituição deseja doar essa revista?");
                        $pessoa->doar($titulo, $numEdicao, $editora, $instituicaoPessoaDestino);
                        break;

                    default: 
                        print("╔════════════════!!!════════════════╗\n");
                        print("║ Desculpe, mas a opção é invalida! ║\n");
                        print("╚═══════════════════════════════════╝\n");
                }
                break;

            case 0:
                print("╔═════════════════════════╗\n");
                print("║ Saindo da biblioteca... ║\n");
                print("╚═════════════════════════╝\n");
                return true;
                
            default: 
                print("╔════════════════!!!════════════════╗\n");
                print("║ Desculpe, mas a opção é invalida! ║\n");
                print("╚═══════════════════════════════════╝\n");
        }
    }

?>
