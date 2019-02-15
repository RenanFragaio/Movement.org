<?php
include"../base/conexao.php";
include"../base/controle.php";

if(isset($_GET['id_usuario'])){

$id_usuario = $_GET['id_usuario'];

$sql = "select nome,email,data_nasc from usuario where id_usuario=$id_usuario";
$seleciona = mysqli_query($conexao,$sql);

$dados = mysqli_fetch_array($seleciona);

}
?>
<div class="container-fluid">
	<div class="row">
	<div class="col-lg-6 offset-lg-3 col-md-6 offset-lg-3 col-sm-6 offset-sm-3 col-xs-12 offset-xs-0">
	
	<h3 class="page-header text-center">Alterar dados Pessoais</h3>
	
	<form name="editar" method="post" action="../usuario/update_usuario.php" enctype="multipart/form-data">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" class="form-control" maxlength="30" value="<?php echo $dados['nome'];?>" required />
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="text" name="email" class="form-control" maxlength="80" value="<?php echo $dados['email'];?>" required />
		</div>
		<div class="form-group">
			<label for="email">Data_Nasc:</label>
			<input type="text" name="data_nasc" class="form-control" value="<?php echo $dados['data_nasc'];?>" required />
		</div>
		
		<!-- id do usuario sendo passado -->
		<input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>"/>
		
		<button type="submit" class="btn btn-primary">Atualizar</button>
	</form>
	</div> <!--coluna centralizada-->
</div>