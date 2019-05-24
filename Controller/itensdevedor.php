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
<title>Itens Comprados</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body class="blue-grey darken-1" style="background-image: url(../Public/img/bgg.png); width: 100%;">

  <?php

  include 'config.php';
    if(!isset($_POST["exibir"])){
      $prod_comprados = $_GET["prod_comprados"];
    }else {
      $prod_comprados = $_POST["prod_comprados"];

      header("Location:devedor.php");
    }





    $itens=$base->query("SELECT * FROM devedor INNER JOIN itensdevedor ON devedor.id = itensdevedor.idItensDevedor  WHERE devedor.prod_comprados = $prod_comprados")->fetchAll(PDO::FETCH_OBJ);



  ?>

  <div class="row" style="margin-top: 30px">
    <a href="../View/devedor.php" class="btn col s12 m10 offset-m1">Voltar</a>
  </div>

<div class="row" style="margin-top: 20px">
  <table class="striped col s12 m10 offset-m1 white z-depth-5">
    <thead>
      <th>Devedor</th>
      <th>Produtos</th>
      <th>Data da Compra</th>
      <th>Quantidade</th>
    </thead>
    <tbody>
      <?php
      foreach ($itens as $devedor) :
      echo
      "
      <tr>
      <td> $devedor->devedor </td>
      <td> $devedor->produtos </td>
      <td> $devedor->dataCompra </td>
      <td> $devedor->quantidade </td>
      <tr>
      ";
      endforeach;
       ?>
    </tbody>
  </table>
</div>



</body>
</html>
