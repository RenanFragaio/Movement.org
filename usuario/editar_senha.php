<?php
	include"../base/seguranca_adm.php";
	include"../base/conexao.php";
	include"../base/controle.php";
	
	if(isset($_GET['id_usuario'])){
	$id_usuario = $_GET['id_usuario'];
	
	$sql = "select senha from usuario where id_usuario=$id_usuario";
	$seleciona = mysqli_query($conexao,$sql);
	
	$dados = mysqli_fetch_array($seleciona);
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-0 col-xs-12">
			<h3 class="page-header text-center">Alterar Senha do Usuário</h3>
	
			<form name="editar_senha" method="post" action="../usuario/update_senha.php">
			
			<div class="form-group">
					<label>Digite a Senha Atual:</label>
					<input type="password" class="form-control" name="senha_antiga" required />
			</div>
			<div class="form-group">
					<label>Digite uma Nova Senha:</label>
					<input type="password" class="form-control" name="senha1" required />
			</div>
			<div class="form-group">
					<label>Confirme Nova Senha:</label>
					<input type="password" class="form-control" name="senha2" required />
			</div>
			
			<input type="hidden" name="id_usuario" value="<?php echo $id_usuario;?>" />
			
			<div class="form-group">
				<a href="../usuario/lista_usuario.php" class="btn btn-default">Voltar</a> | <button type="submit" class="btn btn-primary">Atualizar</a>
			</div>
			
			</form>	
		</div>
	</div>
</div>
<?php 

} 
else{
	echo"<script>
            alert('Pagina não encontrada ou removida. Redirecionando...');
            window.location = '../base/index.php';
        </script>";
}

include"../base/rodape.php"; 
?>
