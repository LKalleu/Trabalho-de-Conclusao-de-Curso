<?php
ini_set("display_errors",1);
ini_set("display_startup_erros",1);
error_reporting(E_ALL);

include '../Model/config.php';

//$registro=$coneccao->fetchAll(PDO::FETCH_OBG);

$produtos=$base->query("SELECT * FROM produto")->fetchAll(PDO::FETCH_OBJ);
$tipo=$base->query("SELECT * FROM tipoproduto")->fetchAll(PDO::FETCH_OBJ);
$fornecedor=$base->query("SELECT * FROM fornecedor")->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html>
<head>
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
    }
  </style>
  </script>
  <title>Página Devedores</title>
</head>
<body style="background-image: url(../Public/img/bgg.png); width: 100%;">

  <!-- Menu -->
  <nav class="blue-grey darken-2">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo hide-on-small-only">Mercearia São José</a>
      <a href="#" class="brand-logo hide-on-med-and-up">Mercearia S.J</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="home.php">Home</a></li>
        <li><a href="produtos.php">Produtos</a></li>
        <li><a href="historico.php">Histórico</a></li>
        <li><a href="devedor.php">Devedor</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="home.php">Home</a></li>
        <li><a href="produtos.php">Produtos</a></li>
        <li><a href="historico.php">Histórico</a></li>
        <li><a href="devedor.php">Devedor</a></li>
      </ul>
    </div>
  </nav>

  <!-- Botão para adicionar novo Devedor -->
  <div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large red modal-trigger" href="#modal1">
      <i class="large material-icons">add</i>
    </a>
  </div>

  <!-- Modal Devedor -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class="center">Adicionar Novo Produto</h4>
      <form action="../Controller/insert.php" method="POST">
        <div class="col s12">
          <div class="col s12">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome do produto">

            <div class="input-field col s12">
              <form class="">
              <select style="margin-top: 5px; margin-bottom: 5px;">
                <option value="" disabled selected>Escolha o tipo de produto...</option>
                <?php
                foreach ($tipo as $valores) :
                  echo
                  "
                  <option value=''>
                   $valores->descricao
                  </option>
                  ";
                endforeach;
                ?>
              </select>
              </form>
            </div>

            <div class="input-field col s12">
              <form class="">
              <select style="margin-top: 5px; margin-bottom: 5px;">
                <option value="" disabled selected>Escolha o fornecedor...</option>
                <?php
                foreach ($fornecedor as $valores) :
                  echo
                  "
                  <option value=''>
                   $valores->nome
                  </option>
                  ";
                endforeach;
                ?>
              </select>
              </form>
            </div>

            <label>Preço:</label>
            <input type="text" name="preco" placeholder="R$ ">

            <label>Marca:</label>
            <input type="text" name="marca" placeholder="Digite a marca do produto">

          </div>
        </div>
    </div>
    <div class="modal-footer">
      <input class="btn-flat" type="submit" name="cr" id="cr" value="Inserir">
    </form>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>
  </div>

  <!-- Tabela com Devedores -->

<div class="row" style="margin-top: 20px">
  <table class="responsive-table col s12 m10 offset-m1 white" style="border-radius: 10px; border: 5px solid #37474f;">
    <thead class="hide-on-small-only">
      <tr>
        <th>Nome</th>
        <th>Tipo</th>
        <th>Preço</th>
        <th>Marca</th>
        <th>Forncedor</th>
      </tr>
    </thead>

    <tbody class="hide-on-small-only">
      <?php
      foreach ($produtos as $valores) :
        echo
        "
        <tr>
        <td> $valores->nome </td>
        <td> $valores->tipo </td>
        <td> $valores->preco </td>
        <td> $valores->marca </td>
        <td> </td>
        </tr>
        ";
      endforeach;
      ?>
    </tbody>

    <?php
    foreach ($produtos as $valores) :
      echo
      "
      <thead class='hide-on-med-and-up' style='border-bottom: 2px solid grey;'>
        <tr>
          <th>Data de Recebimento</th>
          <th>Fornecedor</th>
          <th>Produtos</th>
          <th>Marca</th>
        </tr>
      </thead>

      <tbody class='hide-on-med-and-up' style='border-bottom: 2px solid grey;'>
      <tr>
      <td> $valores->nome </td>
      <td> $valores->tipo </td>
      <td> $valores->preco </td>
      <td> $valores->marca </td>
      <td> </td>
      </tr>
      </tbody>
      ";
    endforeach;
    ?>
  </table>
</div>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../Public/Js/materialize.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.modal').modal();
  });
  $(".button-collapse").sideNav();

  $(document).ready(function() {
  $('select').material_select();
});
</script>
</body>
</html>
