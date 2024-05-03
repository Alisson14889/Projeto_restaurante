<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div>
        <?php 
        require_once 'config.php';

        //dados do forulário
        $nome = $_POST["nome"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $phone = $_POST["phone"];
        $data_atual = date('d/m/Y');
        $hora_atual = date('H:i:s');

        //instruções para inserir dados na tabela
        $smtp = $conn->prepare("INSERT INTO cadastro(nome, login, senha, phone, data, hora) VALUES (?,?,?,?,?,?)");

        $smtp->bind_param("ssssss", $nome, $login, $senha, $phone, $data_atual, $hora_atual);

        //Mensagem caso os dados sejam enviados com sucesso
        if ($smtp->execute()) {
            echo "<h2>Seu cadastro foi realizado com sucesso.</h2>";
        }else {
            echo "<h2>Erro ao realizar cadastro.".$smtp->error."</h2>";
        }

        //Encerrando as conexões
        $smtp->close();
        $conn->close();
        ?>
    </div>
    <a href="login1.html"><button>Ir para tela de Login</button></a>
    <a href="cadastro1.html"><button>Ir para tela de Cadastro</button></a>
</body>
</html>
