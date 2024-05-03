<?php 
//Configurações de credenciais
$servidor = "localhost";
$usuario = "root";
$senha = ""; 
$banco = "restaurant";

//Conexão com nosso banco de dados
$conn = new mysqli($servidor,$usuario,$senha,$banco);

//Vericando a conexão
if ($conn->connect_error) {
    die("Falha ao se conectar comunicar com o Banco e Dados:".$conn->connect_error);
}
?>