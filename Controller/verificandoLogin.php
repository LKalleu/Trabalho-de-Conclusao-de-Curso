<?php
  require_once ('banco.php');

  session_start();
      $n1 = isset($_POST['email'])?$_POST['email']:'erro Email';
      $n2 = isset($_POST['senha'])?$_POST['senha']:'erro Senha';
      $home = '../View/index.php';

      class login {
        function valida($n1,$n2,$home){
        $obj = new Banco();
        $qry="SELECT * FROM usuario";
        $result = $obj->exeQuery($qry);
        foreach ($result as $value){
          $id = $value['id'];
        if ($n1 == $value['email'] and $n2 == $value['senha']){
              $_SESSION['online'] = "ON";
              $_SESSION['iduser'] = $id;
              $_SESSION['nome'] = $value['nome'];
              header("Location:../View/home.php");
          }else{
            $home2 = '../View/index.php';
            header("Location: ".$home2);
          }
        }
      }
    }

      $obj = new login;
      $obj-> valida($n1,$n2,$home);

  ?>
