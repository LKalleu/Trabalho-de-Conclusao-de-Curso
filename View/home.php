<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../Public/img/icon.png" type="image/x-icon">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../Public/Css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../Public/Css/Home.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body class="blue-grey lighten-2 row">

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


      <img src="../Public/img/banner.png" alt="logo" width="70%" style="margin-left: 15%; margin-top: 30px;" class="hide-on-med-and-down">
      <img src="../Public/img/banner.png" alt="logo" width="90%" style="margin-left: 5%; margin-top: 40px;" class="hide-on-small-only hide-on-large-only">
      <img src="../Public/img/banner.png" alt="logo" width="100%" style="margin-top: 30%" class="hide-on-med-and-up">

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../Public/Js/materialize.min.js"></script>
    <script type="text/javascript">
      $(".button-collapse").sideNav();
    </script>
  </body>
</html>
