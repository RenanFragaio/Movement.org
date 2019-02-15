<?php
include"../base/conexao.php";
include"../base/controle.php";

$sql = "select * from curtir";
$seleciona = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

echo"<table border='1'>
	<tr>
		<td>usuario</td>
		<td>postagem</td>";
while($dados = mysqli_fetch_array($seleciona)){
	echo"<tr>";
	echo "<td>".$dados['id_usuario']."</td>";
	echo "<td>".$dados['id_post']."</td>";
	echo"</tr>";
}
echo"</table>";
include"../base/rodape.php";
?>