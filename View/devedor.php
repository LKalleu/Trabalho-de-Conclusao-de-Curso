<?php
ini_set("display_errors",1);
ini_set("display_startup_erros",1);
error_reporting(E_ALL);

include '../Model/config.php';

//$registro=$coneccao->fetchAll(PDO::FETCH_OBG);

$registro=$base->query("SELECT * FROM devedor")->fetchAll(PDO::FETCH_OBJ);


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
      <i class="large material-icons">mode_edit</i>
    </a>
  </div>

  <!-- Modal Devedor -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 class="center">Adicionar Devedor</h4>
      <form action="../Controller/insert.php" method="POST">
        <div class="row">
          <div class="col s12 m6">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Nome">
          </div>
          <div class="col s12 m6">
            <label>Email:</label>
            <input type="text" name="email" placeholder="Email">
          </div>
          <div class="col s12 m6">
            <label>Senha:</label>
            <input type="text" name="senha" placeholder="Senha">
          </div>
          <div class="col s12 m6">
            <label>Contato:</label>
            <input type="text" name="contato" placeholder="Contato">
          </div>
          <div class="col s12 m6">
            <label>Rua:</label>
            <input type="text" name="rua" placeholder="Rua">
          </div>
          <div class="col s12 m6">
            <label>Bairro:</label>
            <input type="text" name="bairro" placeholder="Bairro">
          </div>
          <div class="col s12 m6">
            <label>Numeração:</label>
            <input type="text" name="numeracao" placeholder="Numeração">
          </div>
          <div class="col s12 m6">
            <label>CEP:</label>
            <input type="text" name="cep" placeholder="CEP">
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
      <h4 class="center">Detalhes/Endereço</h4>
      <form method="POST" id="form-pesquisa" action="">
        Pesquisar: <input type="text" name="pesquisa" id="pesquisa" placeholder="Digite o nome do Devedor...">
      </form>

      <ul class="resultado">

      </ul>
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
  <table class="responsive-table col s12 m10 offset-m1 white" style="border-radius: 10px; border: 5px solid #37474f;">
    <thead class="hide-on-small-only">
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Contato</th>
        <th>Itens Comprados</th>
        <th>Excluir</th>
        <th>Editar</th>
      </tr>
    </thead>

    <tbody class="hide-on-small-only">
      <?php
      foreach ($registro as $pessoa) :
        echo
        "
        <tr>
        <td> $pessoa->nome </td>
        <td> $pessoa->email </td>
        <td> $pessoa->contato </td>
        <td> <a class='btn green modal-trigger' href='../Controller/itensdevedor.php?prod_comprados= $pessoa->prod_comprados'>Exibir</a> </td>
        <td> <a class='btn red' href='../Controller/deletar.php?id= $pessoa->id'><i class='material-icons'>delete_sweep</i></a> </td>
        <td> <a class='btn blue' href='../Controller/editar.php?id= $pessoa->id & nome= $pessoa->nome & email= $pessoa->email & senha= $pessoa->senha & contato= $pessoa->contato & rua= $pessoa->rua & bairro= $pessoa->bairro & numeracao= $pessoa->numeracao & cep= $pessoa->cep'><i class='material-icons'>create</i></a></td>
        </tr>
        ";
      endforeach;
      ?>
    </tbody>

    <?php
    foreach ($registro as $pessoa) :
      echo
      "
      <thead class='hide-on-med-and-up' style='border-bottom: 2px solid grey;'>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Contato</th>
          <th>Itens Comprados</th>
          <th>Excluir</th>
          <th>Editar</th>
        </tr>
      </thead>

      <tbody class='hide-on-med-and-up' style='border-bottom: 2px solid grey;'>
      <tr>
      <td> $pessoa->nome </td>
      <td> $pessoa->email </td>
      <td> $pessoa->contato </td>
      <td> <a class='green-text modal-trigger' href='itensdevedor.php?prod_comprados= $pessoa->prod_comprados' name = 'exibir'>Exibir</a> </td>
      <td> <a class='red-text' href='../Controller/deletar.php?id= $pessoa->id'>Deletar</a> </td>
      <td> <a class='blue-text' href='../Controller/editar.php?id= $pessoa->id & nome= $pessoa->nome & email= $pessoa->email & senha= $pessoa->senha & contato= $pessoa->contato & rua= $pessoa->rua & bairro= $pessoa->bairro & numeracao= $pessoa->numeracao & cep= $pessoa->cep'>Editar</a></td>
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
</script>
</body>
</html>
