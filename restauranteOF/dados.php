<?php 
    require_once 'config.php';

    //dados do forulário
    $i = 0;
    $comida = $_POST["comida"];
    $bebida = $_POST["bebe"];
    $quant = $_POST["quant"]; 
    $data_atual = date('d/m/Y');
    $hora_atual = date('H:i:s');

    //Código para concatenar todos os itens dos arrays em uma string
    $pedidoc = implode(', ',$comida);
    $pedidob = implode(', ',$bebida);
   

    //Valores dos pratos
    $muss = 35.0;
    $port = 35.0;
    $lasanha = 37.0;
    $humbur = 14.0;
    

    //Valores das bebidas
    $coca = 13.0;
    $fantau = 10.0;
    $fantal = 10.0;
    $sucog = 7.50;
    $agua = 5.00;

    //Variável valor total
    $vtot = 0;

    //Variáveis que irão receber os valores totais de comidas e bebidas
    $comecont = 0;
    $bebecont = 0;

    //Código para somar todos os valores recebidos por comida
    foreach ($comida as $itemComida) {
        switch ($itemComida) {
            case "Pizza de Mussarela":
                $comecont += $muss;
                break;
            case "Pizza Portuguesa":
                $comecont += $port;
                break;
            case "Lasanha":
                $comecont += $lasanha;
                break;
            case "Hamburguer":
                $comecont += $humbur;
                break;
        }
    }
    //Código para somar todos os valores recebidos por bebida
    foreach ($bebida as $itemBebida) {
        switch ($itemBebida) {
            case "Coca Cola":
                $bebecont += $coca;
                break;
            case "Fanta Laranja":
                $bebecont += $fantal;
                break;
            case "Fanta Uva":
                $bebecont += $fantau;
                break;
            case "Suco de Goiaba":
                $bebecont += $sucog;
                break;
            case "Água":
                $bebecont += $agua;
                break;
        }
    }

    foreach ($comida as $itemComida) {
        switch ($itemComida) {
            case "Pizza de Mussarela":
                $comecont += $muss;
                break;
            case "Pizza Portuguesa":
                $comecont += $port;
                break;
            case "Lasanha":
                $comecont += $lasanha;
                break;
            case "Hamburguer":
                $comecont += $humbur;
                break;
        }
    }
    
    // Absorvendo o valor total do pedido
    $vtot = $bebecont + $comecont;
    
    //Formatando o valor total do pedido
    $formatvtot = "R$ ". number_format($vtot,2,".",",");

    //instruções para inserir dados na tabela
    $smtp = $conn->prepare("INSERT INTO compra(comida, bebida, vtot, data, hora) VALUES (?,?,?,?,?)");

    $smtp->bind_param("sssss", $pedidoc, $pedidob, $formatvtot, $data_atual, $hora_atual);

    //Mensagem caso os dados sejam enviados com sucesso
    if ($smtp->execute()) {
        echo "<h2>Seu pedido foi confirmado.</h2>";
    }else {
        echo "<h2>Erro ao enviar pedido.".$smtp->error."</h2>";
    }

    //Encerrando as conexões
    $smtp->close();
    $conn->close();
    ?>