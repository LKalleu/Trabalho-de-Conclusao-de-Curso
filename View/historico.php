<?php
ini_set("display_errors",1);
ini_set("display_startup_erros",1);
error_reporting(E_ALL);

include 'config.php';

//$registro=$coneccao->fetchAll(PDO::FETCH_OBG);

$registro=$base->query("SELECT * FROM historico")->fetchAll(PDO::FETCH_OBJ);
$produtos=$base->query("SELECT * FROM produto")->fetchAll(PDO::FETCH_OBJ);
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
        <li><a href="produtos.php">Histórico</a></li>
        <li><a href="devedor.php">Devedor</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="home.php">Home</a></li>
        <li><a href="produtos.php">Produtos</a></li>
        <li><a href="produtos.php">Histórico</a></li>
        <li><a href="devedor.php">Devedor</a></li>
      </ul>
    </div>
  </nav>

  <!-- Botão para adicionar novo Devedor -->
  <div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large red modal-trigger" href="#modal1">
      <i class="large material-icons">mode_edit</i>
    </a>
  </div>

  <!-- Modal Devedor -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class="center">Adicionar Devedor</h4>
      <form action="../Controller/insert.php" method="POST">
        <div class="col s12">
          <div class="col s12">
            <label>Data do Recebimento:</label>
            <input type="text" name="datarecebimento" placeholder="00/00/0000">
            <label>Quantidade:</label>
            <input type="text" name="quantidade" placeholder="Quantidade">

            <div class="input-field col s12">
              <form class="">
              <select style="margin-top: 5px; margin-bottom: 5px;">
                <option value="" disabled selected>Escolha um dos fornecedores...</option>
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

            <div class="input-field col s12">
              <form class="">
              <select multiple>
                <option value="" disabled selected>Escolha um dos produtos...</option>
                <?php
                foreach ($produtos as $valores) :
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

          </div>
        </div>
    </div>
    <div class="modal-footer">
      <input class="btn-flat" type="submit" name="cr" id="cr" value="Inserir">
    </form>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>
  </div>


  <!-- Detalhes -->
  <div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class="center">Detalhes</h4>

    </div>
    <div class="modal-footer">
      <input class="modal-action modal-close waves-effect waves-green btn-flat" type="submit" name="enviar" value="Pesquisar">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancelar</a>
    </div>
  </div>

  <div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating green modal-trigger" href="#modal1"><i class="material-icons">add</i></a></li>
      <li><a class="btn-floating yellow darken-1 modal-trigger" href="#modal2"><i class="material-icons">assignment</i></a></li>
    </ul>
  </div>

  <!-- Tabela com Devedores -->

<div class="row" style="margin-top: 20px">
  <table class="responsive-table col s12 m10 offset-m1 white" style="border-radius: 10px;">
    <thead>
      <tr>
        <th>Data de Recebimento</th>
        <th>Fornecedor</th>
        <th>Produtos</th>
        <th>Quantidade</th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($registro as $historico) :
        echo
        "
        <tr>
        <td> $historico->dataRecebimento </td>
        <td> $historico->fornecedor </td>
        <td> $historico->produtos </td>
        <td> $historico->quantidade </td>
        </tr>
        ";
      endforeach;
      ?>
    </tbody>
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
