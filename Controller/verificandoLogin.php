<?php
  require_once ('../Model/conexao.php');

  $login = $_POST['email'];
  $senha = $_POST['senha'];

  $sql = $conn->prepare("SELECT * FROM usuario WHERE email = '$login' AND senha = '$senha'");
  $sql->execute();
  $num = $sql->rowCount();


  if ($num > 0) {

    session_start();
    $_SESSION["email"] = $login;
    $_SESSION["senha"] = $senha;

    $verificar = $conn->query("SELECT * FROM usuario");

    while ($linha = $verificar->fetch(PDO::FETCH_ASSOC)) {
      if ($linha['email'] == $login) {
        $nivel = $linha['tipoUsuario'];

        switch ($nivel) {
          case '1':
            header("location: ../paginas/home/home.php");
            break;

          case '2';
            header("location: ../paginas/home/home.php");
            break;

          case '3';
            echo "USUARIO COMUM";
            break;

          default:
            header("location: ../index.php");
            break;
        }
      }
    }
  }
 ?>
