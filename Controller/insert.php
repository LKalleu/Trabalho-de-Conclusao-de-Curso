<?php
include 'config.php';

if(isset($_POST["cr"]))
{
  $nome=$_POST["nome"];
  $email=$_POST["email"];
  $senha=$_POST["senha"];
  $contato=$_POST["contato"];
  $rua=$_POST["rua"];
  $bairro=$_POST["bairro"];
  $numeracao=$_POST["numeracao"];
  $cep=$_POST["cep"];


  $sql = "INSERT INTO devedor (nome, email, senha, contato, rua, bairro, numeracao, cep) VALUES (:nome, :email, :senha, :contato, :rua, :bairro, :numeracao, :cep)";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":nome"=>$nome, ":email"=>$email, ":senha"=>$senha, ":contato"=>$contato, ":rua"=>$rua, ":bairro"=>$bairro, ":numeracao"=>$numeracao, ":cep"=>$cep));


  header("Location:../View/devedor.php");


}
?>
