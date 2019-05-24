<?php
ini_set("display_errors",1);
ini_set("display_startup_erros",1);
error_reporting(E_ALL);
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../Public/Css/materialize.min.css"  media="screen,projection"/>
  <link rel="shortcut icon" href="../Public/img/icon.png" type="image/x-icon">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
  <script type="text/javascript" src="../Public/Js/javascriptpersonalizado.js"></script>
  <style media="screen">
  @font-face {
    font-family: alibabasans;
    src: url('../Public/Fonts/AlibabaSans/AlibabaSans-Bold.otf');
  }

  html {
    font-family: alibabasans;
    font-size: 15px;
  }
</style>
<title>Página Editar</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="blue-grey darken-2">

  <?php

  include 'config.php';

  if(!isset($_POST["atualizar"]))
  {

    $id=$_GET["id"];
    $nome=$_GET["nome"];
    $email=$_GET["email"];
    $senha=$_GET["senha"];
    $contato=$_GET["contato"];
    $rua=$_GET["rua"];
    $bairro=$_GET["bairro"];
    $numeracao=$_GET["numeracao"];
    $cep=$_GET["cep"];
  }
  else
  {
    $id=$_POST["id"];
    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $senha=$_POST["senha"];
    $contato=$_POST["contato"];
    $rua=$_POST["rua"];
    $bairro=$_POST["bairro"];
    $numeracao=$_POST["numeracao"];
    $cep=$_POST["cep"];

    $sql="UPDATE devedor SET nome=:nome, email=:email, senha=:senha, contato=:contato, rua=:rua, bairro=:bairro, numeracao=:numeracao, cep=:cep WHERE id=:myid";

    $resultado=$base->prepare($sql);

    $resultado->execute(array(":myid"=>$id,":nome"=>$nome, ":email"=>$email, ":senha"=>$senha, ":contato"=>$contato, ":rua"=>$rua, ":bairro"=>$bairro, ":numeracao"=>$numeracao, ":cep"=>$cep));

    header("Location:devedor.php");
  }

  ?>

  <div class="row" style="margin-top: 20px">
    <form class="col s12 m10 offset-m1 white" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" style="border-radius: 10px; padding:20px;">

      <input type="hidden" name="id" id="id" value="<?php echo $id?>">

      Nome: <input type="text" name="nome" id="nome" value="<?php echo $nome?>">

      Email: <input type="email" name="email" id="email" value="<?php echo $email?>">

      Senha: <input type="text" name="senha" id="senha" value="<?php echo $senha?>">

      Contato: <input type="text" name="contato" id="contato" value="<?php echo $contato?>">

      Rua: <input type="text" name="rua" id="rua" value="<?php echo $rua?>">

      Bairro: <input type="text" name="bairro" id="bairro" value="<?php echo $bairro?>">

      Numeração: <input type="text" name="numeracao" id="numeracao" value="<?php echo $numeracao?>">

      CEP: <input type="text" name="cep" id="cep" value="<?php echo $cep?>">

      <input class="btn" type="submit" name="atualizar" id="atualizar" value="Atualizar">

    </form>
  </div>
  <p>&nbsp;</p>


</body>
</html>
