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
<title>Update</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="blue-grey darken-1" style="background-image: url(../Public/img/bgg.png); width: 100%;">
  <br><br>

  <div class="row" style="margin-top: 30px">
    <a href="../View/historico.php" class="btn col s12 m10 offset-m1">Voltar</a>
  </div>

<div class="row">
  <table class="col s12 m10 offset-m1 white z-depth-5">
    <thead>
      <tr>
          <th>Data do Recebimento</th>
          <th>Fornecedor</th>
          <th>Produtos</th>
          <th>Quantidade</th>
      </tr>
    </thead>

    <tbody>
      <?php
          include '../Model/conexao.php';

          $pesquisar = $_POST['buscar'];
          $result_cursos = "SELECT * FROM historico WHERE dataRecebimento LIKE '%$pesquisar%'";
          $resultado_cursos = mysqli_query($conn, $result_cursos);

          while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
              echo "<tr><td>".$rows_cursos['dataRecebimento']."</td>";
              echo "<td>".$rows_cursos['fornecedor']."</td>";
              echo "<td>".$rows_cursos['produtos']."</td>";
              echo "<td>".$rows_cursos['quantidade']."</td></tr>";
          }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
