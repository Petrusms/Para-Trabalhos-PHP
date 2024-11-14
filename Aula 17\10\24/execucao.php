<?php
require_once("modelo/IBiblioteca.php");
require_once("modelo/Livro.php");
require_once("modelo/Autor.php");
require_once("modelo/Gibi.php");
require_once("modelo/Revista.php");
require_once("modelo/Pessoa.php");

$pessoas = [
    new Pessoa("Jorge", "24/10/1998", "800.546.122-00", "@jorge24"),
    new Pessoa("Maria", "04/01/2000", "800.546.122-00", "@maria04"),
    new Pessoa("João", "03/09/2002", "800.546.122-00", "@joAo03"),
    new Pessoa("Lucas", "13/11/2005", "800.546.122-00", "@Lucas13"),
    new Pessoa("Pedro", "13/08/1990", "800.546.122-00", "@PEDRO13"),
];

while(true){
    print("╔══════════════════════════════SEJA BEM VINDO══════════════════════════════╗\n");
    print("║   Olá, seja bem vindo a minha atividade, escolha uma das opcões abaixo:  ║\n");
    print("║                                1: Cadastro                               ║\n");
    print("║                                2: Login                                  ║\n");
    print("║                                0: Sair                                   ║\n");
    print("╚══════════════════════════════════════════════════════════════════════════╝\n");

    $opcao = readline("");
    switch($opcao){
        case 1:
            $pessoa = new Pessoa();
            print("═══════════CADASTRO═══════════════\n");
            $pessoa->setNome(readline(" Para cadastrar informe seu nome: "));
            $pessoa->setCpf(readline(" Agora informe seu CPF: "));
            $pessoa->setDataNascimento(readline("Agora informe sua data de nascimento: "));
            $pessoa->setTelefone(readline(" Agora informe seu telefone: "));

            $para = true;
            while($para){
                $senha = readline(" Agora preciso que informe sua senha: (Não coloque uma fácil e não esqueça de anota-lá)");
                $senhaConfirma = readline(" Agora confirme sua senha: ");
                if($senha == $senhaConfirma){
                    $pessoa->setSenha($senhaConfirma);
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
            break;
        case 2:

        case 0:
            print("╔═══════════════════════╗\n");
            print("║ Programa encerrado... ║\n");
            print("╚═══════════════════════╝\n");
            return true;
            
        default: 
            print("╔════════════════!!!════════════════╗\n");
            print("║ Desculpe, mas a opção é invalida! ║\n");
            print("╚═══════════════════════════════════╝\n");
    }
}
?>
