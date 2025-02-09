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
            if($dados->getTipo() == "L"){
                print("Tipo: Livro | ID: {$dados->getId()} | Título: {$dados->getTitulo()} | Ano de Publicação: {$dados->getAnoPublicacao()} | Categoria: {$dados->getCategoria()} | Núm de Páginas: {$dados->getNumPagina()} | Núm de Capítulos: {$dados->getNumCapitulo()}\n");
            } else if($dados->getTipo() == "G"){
                print("Tipo: Gibi | ID: {$dados->getId()} | Título: {$dados->getTitulo()} | Ano de Publicação: {$dados->getAnoPublicacao()} | Edição Nº{$dados -> getNumEdicao()}\n");                                       
            } else if($dados->getTipo() == "R"){   
                print("Tipo: Revista | ID: {$dados->getId()} | Título: {$dados->getTitulo()} | Ano de Publicação: {$dados->getAnoPublicacao()} | Edição Nº{$dados -> getNumEdicao()} | Editora: {$dados -> getEditora()}\n"); 
            } 
        }                   
    }                                 
}

    while(true){
        print("╔═══════════════════════════════ SEJA BEM VINDO ═════════════════════════════╗\n");
        print("║   Olá, seja bem-vindo à sua biblioteca, escolha uma das opções abaixo:     ║\n");
        print("║                                1: Inserir                                  ║\n");
        print("║                                2: Listar                                   ║\n");
        print("║                                3: Buscar                                   ║\n");
        print("║                                4: Excluir                                  ║\n");
        print("║                                5: Emprestar                                ║\n");
        print("║                                6: Doar                                     ║\n");
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
                print("║                                 1: Listar todos os materiais                 ║\n");
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
                        $pessoa->listarEmp();
                        break;
                    case 3:
                        $pessoa->listarDoa();
                        break;
                    default: 
                        print("╔════════════════!!!════════════════╗\n");
                        print("║ Desculpe, mas a opção é invalida! ║\n");
                        print("╚═══════════════════════════════════╝\n");
                }
                break;
            case 3:
                $id = readline("Informe o id do material de leitura: ");
                $titulo = readline("Informe o título do material de leitura: ");
                $registros = $pessoa->buscar($id, $titulo);
                if(empty($registros)){
                    print("Nenhum Material cadrastado!!\n");
                }else{
                    escrever($registros);
                }
                break;
            case 4:
                $registros = $pessoa->listar();
                if(empty($registros)){
                    print("Nenhum Material cadrastado!!\n");
                }else{
                    escrever($registros);
    
                    $id = readline("Informe o id do material de leitura: ");
                    $titulo = readline("Informe o título do material de leitura: ");
                    $registros = $pessoa->buscar($id, $titulo);
                    if($registros!=null){
                        $pessoa->excluir($id, $titulo);
                        print("Material excluido.\n");
                    }else{
                        print("id ou título não encontrado.\n");
                    }
                }
                break;

            case 5:
                $registros = $pessoa->listar();
                if(empty($registros)){
                    print("Nenhum Material cadrastado!!\n");
                }else{
                    escrever($registros);
                $id = readline("Informe o id do material que será emprestado: ");
                $titulo = readline("Informe o titulo do material que será emprestado: ");
                $pessaoDestino = readline("Informe a pessoa que sera emprestado o material: ");
                $pessoa->emprestar($id, $titulo, $pessaoDestino);
                }
                break;

            case 6:
                $registros = $pessoa->listar();
                if(empty($registros)){
                    print("Nenhum Material cadrastado!!\n");
                }else{
                    escrever($registros);
                $id = readline("Informe o id do material que será doado: ");
                $titulo = readline("Informe o titulo do material que será doado: ");
                $pessaoDestino = readline("Informe a pessoa/Instituição que será doado o material: ");
                $pessoa->doar($id, $titulo, $pessaoDestino);
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
