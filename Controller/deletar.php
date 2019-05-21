<!DOCTYPE html>
<html>
<head>
	<title>Deletar</title>
</head>
<body>

	<?php

       include '../Model/config.php';

       $id=$_GET["id"];

       $base->query("DELETE FROM devedor WHERE ID='$id'");

       header("Location:../View/devedor.php");

	?>

</body>
</html>
