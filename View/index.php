<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="shortcut icon" href="../Public/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../Public/Css/Login.css">
    <meta charset="utf-8">
    <title>Login</title>
    <style media="screen">
    body {
      background-image: url(../Public/img/background.jpg);
      background-size: auto;
      background-repeat: no-repeat;
    }
    </style>
  </head>
  <body>
    <div class="aaa">
      <h1>LOGIN</h1>
      <form class="" action="../Controller/verificandoLogin.php" method="POST">
        <div class="tbox">
          <input type="text" placeholder="usuario" name="email" value="">
        </div>

        <div class="tbox">
          <input type="password" placeholder="senha" name="senha" value="">
        </div>

        <input class="botao" type="submit" name="" value="Entrar">
      </form>
      <a href="#" class="b1">ESQUECEU SUA SENHA ?</a>
    </div>
  </body>
</html>
