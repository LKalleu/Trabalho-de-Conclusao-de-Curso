<?php
	//Incluir a conexão com banco de dados
	include_once('../Model/conexao.php');

	//Recuperar o valor da palavra
	$cursos = $_POST['palavra'];

	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$cursos = "SELECT * FROM devedor WHERE nome LIKE '%$cursos%'";
	$resultado_cursos = mysqli_query($conn, $cursos);

	if(mysqli_num_rows($resultado_cursos) <= 0){
		echo "Nenhum usuário encontrado...";
	}else{
		while($rows = mysqli_fetch_assoc($resultado_cursos)){
			echo
			"
			<table class='responsive-table'>
        <thead>
          <tr>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Numeração</th>
            <th>CEP</th>
          </tr>
        </thead>
				<tbody>
			";
			echo "<tr><td>".$rows['rua']."</td>";
			echo "<td>".$rows['bairro']."</td>";
			echo "<td>".$rows['numeracao']."</td>";
			echo "<td>".$rows['cep']."</td></tr>";
			echo
			"
			</tbody>
		</table>
			";
		}
	}
?>
