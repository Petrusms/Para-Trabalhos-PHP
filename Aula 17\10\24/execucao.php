<?php
require_once("modelo/Residencial.php");
require_once("modelo/Comercial.php");
require_once("modelo/Industrial.php");

while(true){
    print("Que tipo de consumidor você é?\n");
    print("1: Residencial\n");
    print("2: Comercial\n");
    print("3: Industrial\n");
    $num=readline("0: Encerrar o pragrama\n");

    switch($num){
        case 1:
            $consumidor = new Residencial();
            $consumidor->setConsumo(readline("Quanto de KWh você consome?"));
            break;
        case 2:
            $consumidor = new Comercial();
            $consumidor->setConsumo(readline("Quanto de KWh você consome?"));
            break;
        case 3: 
            $consumidor = new Industrial();
            $consumidor->setConsumo(readline("Quanto de KWh você consome?"));
            break;
        case 0:
            print("Programa encerrado...");
            return true;

        default: 
            print("Opção invalida!\n");
    }
    print("\nO valor que você paga de fatura de KWh é R$ ". $consumidor->getValorFatura() ."\n\n");
}
?>
