<?php
require_once("modelo/IBiblioteca.php");
require_once("modelo/Livro.php");
require_once("modelo/Autor.php");
require_once("modelo/Gibi.php");
require_once("modelo/Revista.php");
require_once("modelo/Pessoa.php");

$pessoas = [
    new Pessoa("Jorge", "24/10/1998", "800.546.121-00", "(45) 99999-9999", "@jorge24"),
    new Pessoa("Maria", "04/01/2000", "800.547.120-00", "(45) 99999-9990", "@maria04"),
    new Pessoa("João", "03/09/2002", "800.549.119-00", "(45) 99999-9900", "@joAo03"),
    new Pessoa("Lucas", "13/11/2005", "800.846.118-00", "(45) 99999-9000", "@Lucas13"),
    new Pessoa("Pedro", "13/08/1990", "800.506.117-00", "(45) 99999-0000", "@PEDRO13"),
];

//Exemplos de Livros
$autor1 = new Autor();
$autor1->setNome("Machado de Assis")
        ->setDataNascimento("21/06/1839")
        ->setNacionalidade("Brasileiro")
        ->setQtdTipoPublicados(30)
        ->setSexo("Masculino");

$ML1 = new Livro();
$ML1->setTitulo("Dom Casmurro")
    ->setAnoPublicacao(1899)
    ->setCategoria("Romance");
    $ML1->setNumPagina(320)
    ->setNumCapitulo(19)
    ->setAutor($autor1);

$autor2 = new Autor();
$autor2->setNome("Paulo Coelho")
        ->setDataNascimento("24/08/1947")
        ->setNacionalidade("Brasileiro")
        ->setQtdTipoPublicados(35)
        ->setSexo("Masculino");

$ML2 = new Livro();
$ML2->setTitulo("O Alquimista")
    ->setAnoPublicacao(1988)
    ->setCategoria("Ficção/Fantasia");
    $ML2->setNumPagina(208)
    ->setNumCapitulo(10)
    ->setAutor($autor2);

$autor3 = new Autor();
$autor3->setNome("Joaquim Manuel de Macedo")
        ->setDataNascimento("29/06/1820")
        ->setNacionalidade("Brasileiro")
        ->setQtdTipoPublicados(20)
        ->setSexo("Masculino");

$ML3 = new Livro();
$ML3->setTitulo("A Moreninha")
    ->setAnoPublicacao(1844)
    ->setCategoria("Romance");
    $ML3->setNumPagina(240)
    ->setNumCapitulo(12)
    ->setAutor($autor3);

$autor4 = new Autor();
$autor4->setNome("João Guimarães Rosa")
        ->setDataNascimento("27/06/1908")
        ->setNacionalidade("Brasileiro")
        ->setQtdTipoPublicados(15)
        ->setSexo("Masculino");

$ML4 = new Livro();
$ML4->setTitulo("Grande Sertão: Veredas")
    ->setAnoPublicacao(1956)
    ->setCategoria("Romance Regionalista");
    $ML4->setNumPagina(448)
    ->setNumCapitulo(22)
    ->setAutor($autor4);

$autor5 = new Autor();
$autor5->setNome("José de Alencar")
        ->setDataNascimento("01/05/1829")
        ->setNacionalidade("Brasileiro")
        ->setQtdTipoPublicados(30)
        ->setSexo("Masculino");

$ML5 = new Livro();
$ML5->setTitulo("O Guarani")
    ->setAnoPublicacao(1857)
    ->setCategoria("Romance Histórico");
    $ML5->setNumPagina(300)
    ->setNumCapitulo(15)
    ->setAutor($autor5);
    
//Exemplos de Gibis
$ML6 = new Gibi();
$ML6->setTitulo("Turma da Mônica")
    ->setAnoPublicacao(2020)
    ->setCategoria("Infantil");
$ML6->setNumEdicao(100);

$ML7 = new Gibi();
$ML7->setTitulo("Batman: O Cavaleiro das Trevas")
    ->setAnoPublicacao(1986)
    ->setCategoria("Ação/Aventura");
$ML7->setNumEdicao(1);

$ML8 = new Gibi();
$ML8->setTitulo("Mortal Kombat")
    ->setAnoPublicacao(1994)
    ->setCategoria("Ação");
$ML8->setNumEdicao(5);

$ML9 = new Gibi();
$ML9->setTitulo("Asterix e Obelix")
    ->setAnoPublicacao(1967)
    ->setCategoria("Aventura/Comédia");
$ML9->setNumEdicao(12);

$ML10 = new Gibi();
$ML10->setTitulo("Dragon Ball")
    ->setAnoPublicacao(1984)
    ->setCategoria("Ação/Fantasia");
$ML10->setNumEdicao(20);

//Exemplos de Revistas
$ML11 = new Revista();
$ML11->setTitulo("Veja")
    ->setAnoPublicacao(2023)
    ->setCategoria("Atualidades");
$ML11->setNumEdicao(2500);
$ML11->setEditora("Abril");

$ML12 = new Revista();
$ML12->setTitulo("Superinteressante")
    ->setAnoPublicacao(2023)
    ->setCategoria("Ciência e Cultura");
$ML12->setNumEdicao(400);
$ML12->setEditora("Abril");

$ML13 = new Revista();
$ML13->setTitulo("Época")
    ->setAnoPublicacao(2023)
    ->setCategoria("Política e Economia");
$ML13->setNumEdicao(1000);
$ML13->setEditora("Globo");

$ML14 = new Revista();
$ML14->setTitulo("Claudia")
    ->setAnoPublicacao(2023)
    ->setCategoria("Moda e Comportamento");
$ML14->setNumEdicao(1000);
$ML14->setEditora("Abril");

$ML15 = new Revista();
$ML15->setTitulo("Rolling Stone")
    ->setAnoPublicacao(2023)
    ->setCategoria("Música e Cultura Pop");
$ML15->setNumEdicao(200);
$ML15->setEditora("Rolling Stone");

//Biblioteca do Jorge exemplo
$pessoas[0]->adicionar($ML1);
$pessoas[0]->adicionar($ML3);
$pessoas[0]->adicionar($ML5);
$pessoas[0]->adicionar($ML11);
$pessoas[0]->adicionar($ML9);
$pessoas[0]->adicionar($ML7);

//Biblioteca do Maria exemplo
$pessoas[1]->adicionar($ML2);
$pessoas[1]->adicionar($ML3);
$pessoas[1]->adicionar($ML5);
$pessoas[1]->adicionar($ML15);
$pessoas[1]->adicionar($ML8);
$pessoas[1]->adicionar($ML6);

//Biblioteca do João exemplo
$pessoas[2]->adicionar($ML4);
$pessoas[2]->adicionar($ML10);
$pessoas[2]->adicionar($ML13);
$pessoas[2]->adicionar($ML12);
$pessoas[2]->adicionar($ML9);
$pessoas[2]->adicionar($ML14);

//Biblioteca do Lucas exemplo
$pessoas[3]->adicionar($ML5);
$pessoas[3]->adicionar($ML15);
$pessoas[3]->adicionar($ML8);
$pessoas[3]->adicionar($ML9);
$pessoas[3]->adicionar($ML14);
$pessoas[3]->adicionar($ML7);

//Biblioteca do Pedro exemplo
$pessoas[4]->adicionar($ML1);
$pessoas[4]->adicionar($ML3);
$pessoas[4]->adicionar($ML5);
$pessoas[4]->adicionar($ML11);
$pessoas[4]->adicionar($ML9);
$pessoas[4]->adicionar($ML7);

function biblioteca($pessoa){
    while(true){
        print("╔═══════════════════════════════ SEJA BEM VINDO ═════════════════════════════╗\n");
        print("║   Olá, seja bem-vindo à sua biblioteca, escolha uma das opções abaixo:     ║\n");
        print("║                                1: Perfil                                   ║\n");
        print("║                                2: Inserir                                  ║\n");
        print("║                                3: Listar                                   ║\n");
        print("║                                4: Excluir                                  ║\n");
        print("║                                5: Emprestar                                ║\n");
        print("║                                6: Doar                                     ║\n");
        print("║                                0: Sair                                     ║\n");
        print("╚════════════════════════════════════════════════════════════════════════════╝\n");
    
        $opcao = readline("");
        switch($opcao){
            case 1:
                print($pessoa);
                break;
            case 2:
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
                        $autor = new Autor();
                        $autor->setNome(readline("Qual o nome do autor desse livro?"))
                        ->setDataNascimento(readline("Qual a data de nascimento do autor desse livro?"))
                        ->setNacionalidade(readline("Qual a nacionalidade do autor desse livro?"))
                        ->setQtdTipoPublicados(readline("Quantas publicações o autor desse livro fez?"))
                        ->setSexo(readline("Qual o sexo do autor desse livro?"));
                        $ML = new Livro();
                        $ML->setTitulo(readline("Qual o titulo desse livro?"))
                        ->setAnoPublicacao(readline("Qual o ano de publicação desse livro?"))
                        ->setCategoria(readline("Qual o gênero desse livro?"));
                        $ML->setNumPagina(readline("Quantas páginas o livro possuie?"))
                        ->setNumCapitulo(readline("Quantas cáptulos o livro possuie?"))
                        ->setAutor($autor);

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
            case 3:
                $pessoa->listar();
                break;
            case 4:
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
                        $pessoa->excluir($titulo, $autor);
                        break;

                    case 2:
                        $titulo = readline("Qual o titulo do gibi?");
                        $numEdicao = readline("Qual o número de edição desse gibi?");
                        $pessoa->excluir( $titulo, $numEdicao);
                        break;

                    case 3:
                        $titulo = readline("Qual o titulo da revista?");
                        $numEdicao = readline("Qual o número de edição dessa revista?");
                        $pessoa->excluir( $titulo, $numEdicao);
                        break;

                    default: 
                        print("╔════════════════!!!════════════════╗\n");
                        print("║ Desculpe, mas a opção é invalida! ║\n");
                        print("╚═══════════════════════════════════╝\n");
                }

            case 5:
                //$pessoa->emprestar();
                break;

            case 6:
                //$pessoa->doar();
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
}

while(true){
    print("╔═════════════════════════════ SEJA BEM VINDO ═════════════════════════════╗\n");
    print("║   Olá, seja bem vindo a minha atividade, escolha uma das opcões abaixo:  ║\n");
    print("║                                1: Cadastro                               ║\n");
    print("║                                2: Login                                  ║\n");
    print("║                                0: Sair                                   ║\n");
    print("╚══════════════════════════════════════════════════════════════════════════╝\n");

    $opcao = readline("");
    switch($opcao){
        case 1:
            print("═════════════════ CADASTRO ═════════════════\n");
            $nome = readline("Para cadastrar informe seu nome: ");
            $cpf = readline("Agora informe seu CPF: ");
            $dataNascimento = readline("Agora informe sua data de nascimento: ");
            $telefone = readline("Agora informe seu telefone: ");

            $para = true;
            while($para){
                $senha = readline("(Não coloque uma fácil e não esqueça de anota-lá)Agora preciso que informe sua senha: ");
                $senhaConfirma = readline("Agora confirme sua senha: ");
                if($senha == $senhaConfirma){
                    print("╔═════════════════════════════════════════╗\n");
                    print("║ Seu cadastro foi realizado com sucesso! ║\n");
                    print("║ Agora já é possivel fazer o login!      ║\n");
                    print("╚═════════════════════════════════════════╝\n");
                    $para = false;
                } else {
                    print("╔════════════════════════════════════════╗\n");
                    print("║ Desculpe, mas sua senha não é a mesma! ║\n");
                    print("╚════════════════════════════════════════╝\n");
                    continue;
                }
            }
            $pessoa = new Pessoa($nome, $dataNascimento, $cpf, $telefone, $senha);
            array_push($pessoas, $pessoa);
            break;

        case 2:
            print("═════════════════ LOGIN ═════════════════\n");

            $para = true;
            while($para){
                $nome = (readline(" Para logar informe seu nome: "));
                $senha = readline(" Agora preciso que informe sua senha: ");

                $encontrado = false;

                foreach($pessoas as $pessoa){
                    if($senha == $pessoa->getSenha() && $nome == $pessoa->getNome()){
                        print("╔══════════════════════════════════╗\n");
                        print("║ Seu login realizado com sucesso! ║\n");
                        print("╚══════════════════════════════════╝\n");
                        biblioteca($pessoa);
                        $encontrado = true;
                        $para = false;
                    } 
                }
                if(!$encontrado){
                    print("╔════════════════════════════════════════╗\n");
                    print("║ Desculpe, mas não foi encontrado nada! ║\n");
                    print("╚════════════════════════════════════════╝\n");
                    print("\n");
                    print("╔═══════════════ !!! ════════════╗\n");
                    print("║ Escolha uma das opções abaixo: ║\n");
                    print("║      1: Tentar novamente       ║\n");
                    print("║      2: Sair do login          ║\n");
                    print("╚════════════════════════════════╝\n");
                    $opcao = readline("");
                    switch($opcao){
                        case 1:
                            continue 2;

                        case 2:
                            $para = false;
                            break;

                        default:
                            print("╔═══════════════ !!! ═══════════════╗\n");
                            print("║ Desculpe, mas a opção é invalida! ║\n");
                            print("╚═══════════════════════════════════╝\n");
                            break;
                    }
                }
            }
            break;

        case "ADM":
            $senha = readline("Informe a senha para poder ter acesso a função de administrador: ");
            if($senha == "@1234"){
                $stop = true;
                while($stop){
                    print("╔═════════════════════════════ ADIMINISTRADOR ════════════════════════════╗\n");
                    print("║   Olá, seja bem vindo a função de ADM, escolha uma das opcões abaixo:   ║\n");
                    print("║                                1: Listar                                ║\n");
                    print("║                                2: excluir                               ║\n");
                    print("║                                3: Mostrar biblioteca especifica         ║\n");
                    print("║                                4: Mostrar todos as bibliotecas          ║\n");
                    print("║                                0: Sair                                  ║\n");
                    print("╚═════════════════════════════════════════════════════════════════════════╝\n");
                
                    $opcao = readline("");
                        switch($opcao){
                            case 1:
                                foreach ($pessoas as $dado) {
                                    print("Nome: ".$dado->getNome()." | Data Nasc.: ".$dado->getDataNascimento()." | CPF: ".$dado->getCPF()." | Telefone: ".$dado->getTelefone()." | Senha: ".$dado->getSenha()."\n");
                                }
                                break;
                            case 2:
                                if(empty($pessoas)){
                                    print("╔════════════════════════════════════════════════╗\n");
                                    print("║ Não há nenhuma pessoa cadastrada para excluir! ║\n");
                                    print("╚════════════════════════════════════════════════╝\n");
                                    break;
                                }

                                $para = true;
                                while($para){
                                    $nome = readline("Informe o nome: ");
                                    $CPF = readline("Informe o CPF: ");
                                    $senha = readline("Informe a senha: ");

                                    $encontrado = false;

                                    foreach ($pessoas as $index => $dado){
                                        if ($dado->getNome() === $nome && $dado->getCpf() === $CPF && $dado->getSenha() === $senha){
                                            array_splice($pessoas, $index, 1);
                                            print("Removido com sucesso!\n");
                                            $encontrado = true;
                                            $para = false;
                                        }
                                    }

                                    if(!$encontrado){
                                        print("╔════════════════════════════════════════════════╗\n");
                                        print("║ Desculpe, mas não foi encontrado para excluir! ║\n");
                                        print("╚════════════════════════════════════════════════╝\n");
                                        print("\n");
                                        print("╔═══════════════ !!! ════════════╗\n");
                                        print("║ Escolha uma das opções abaixo: ║\n");
                                        print("║      1: Tentar novamente       ║\n");
                                        print("║      2: Sair                   ║\n");
                                        print("╚════════════════════════════════╝\n");
                                        $opcao = readline("");
                                        switch($opcao){
                                            case 1:
                                                continue 2;
                    
                                            case 2:
                                                $para = false;
                                                break;
                    
                                            default:
                                                print("╔═══════════════ !!! ═══════════════╗\n");
                                                print("║ Desculpe, mas a opção é invalida! ║\n");
                                                print("╚═══════════════════════════════════╝\n");
                                                break;
                                        }
                                    }
                                }
                                break;
                            case 3:
                                $nome = readline("Informe o nome: ");
                                $CPF = readline("Informe o CPF: ");
                                $senha = readline("Informe a senha: ");

                                foreach ($pessoas as $index => $dado){
                                    if ($dado->getNome() === $nome && $dado->getCpf() === $CPF && $dado->getSenha() === $senha){
                                        $dado->listar();
                                    }
                                }
                                break;

                            case 4:
                                foreach ($pessoas as $index => $dado){
                                    print($dado->getNome()."\n");
                                    $dado->listar();
                                    print("══════════════════════════════════════════════════════\n");
                                    print("\n");
                                }
                                break;

                            case 0:
                                print("╔═════════════════════════╗\n");
                                print("║ Saindo da função ADM... ║\n");
                                print("╚═════════════════════════╝\n");
                                $stop = false;
                                break;
                                
                            default: 
                                print("╔═══════════════ !!! ═══════════════╗\n");
                                print("║ Desculpe, mas a opção é invalida! ║\n");
                                print("╚═══════════════════════════════════╝\n");
                        }
                    }
                } else {
                print("╔════════════════ !!! ════════════════╗\n");
                print("║ Desculpe, mas a senha está errada!! ║\n");
                print("╚═════════════════════════════════════╝\n");
            }
            break;

        case 0:
            print("╔═══════════════════════╗\n");
            print("║ Programa encerrado... ║\n");
            print("╚═══════════════════════╝\n");
            return true;
            
        default: 
            print("╔═══════════════ !!! ═══════════════╗\n");
            print("║ Desculpe, mas a opção é invalida! ║\n");
            print("╚═══════════════════════════════════╝\n");
    }
}
?>
