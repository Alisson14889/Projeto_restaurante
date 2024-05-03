<?php
    session_start();
//print_r($_REQUEST);
if(isset($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['senha']))
{
    //acessa a pagina
    include_once('config.php');
    $login = $_POST['login'];
    $senha = $_POST['senha'];;

    //print_r('Email: ' . $email);
    //print_r('Senha: ' . $senha);
    $sql = "SELECT * FROM  cadastro WHERE login = '$login' and senha = '$senha' ";

    $result = $conn->query($sql);

    //print_r($sql);
    //print_r($result);

    if(mysqli_num_rows($result) < 1)
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    else{

        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header('Location: cardapio.html');
    }
}

else
{   //não acessa  a pagina
    header('location: login1.html');
}
?>