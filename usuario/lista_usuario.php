<?php
include"../base/seguranca_adm.php";
include"../base/conexao.php";
include"../base/controle.php";

$sql = "select * from usuario";
$seleciona = mysqli_query($conexao,$sql);
?>
<div class="container-fluid">
	<div class="row pad-top">
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> <!-- nome da pagina -->
		<font size="5" type="bold">lista de Usuários</font>
			<a href="../base/inicio_adm.php" class="btn btn-primary pull-right">
				<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Voltar
			</a>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="col-lg-12 col-md-12 col-sm-8 col-xs-12 col-centered"> <!--barra de pesquisa -->
				<form method="post" name="pesquisa" action="pesquisar_usuario.php"> 
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" name="busca" placeholder="pesquisar usuario"/>
							<span class="input-group-btn">
								<button class="btn btn-primary"><!--<span class="glyphicon glyphicon-search" aria-hidden="true"></span>-->Pesquisar</button>
							</span>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">   <!-- botao de novo usuario -->
			<a class="btn btn-success" href="../usuario/cadastrar_usuario.php?nivel=adm">Novo Usuario</a>
		</div>
	</div>
	<div class="row">
	<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<td>Id</td>
			<td>Foto</td>
			<td>Nome</td>
			<td>Data_Nasc</td>
			<td>Email</td>
			<td>Senha</td>
			<td>Nível</td>
			<td>Ações</td>
		</tr>
		<?php
		while($dados = mysqli_fetch_array($seleciona)){
			
		echo"<tr>
			<td>".$dados['id_usuario']."</td>
			<td><div class='container-img-lista'><img src='".$dados['foto_perfil']."' class='img-lista'></div></td>
			<td>".$dados['nome']."</td>
			<td>".$dados['data_nasc']."</td>
			<td>".$dados['email']."</td>
			<td>".$dados['senha']."</td>
			<td>".$dados['nivel']."</td>
			<td>
				<a><button class='btn btn-warning'><img class='icone' src='../img/edit.png'></img></button></a>
				<a href='../usuario/editar_senha.php?id_usuario=".$dados['id_usuario']."'><button class='btn btn-info'><img class='icone' src='../img/lock.png'></img></button></a>
				<button class='btn btn-danger' onClick='Excluir(".$dados['id_usuario'].")'><img class='icone' src='../img/remove.png'></img></button>
				<!--<button onclick='deletaDado(".$dados['id_usuario'].")' data-toggle='modal' href='#delete-modal' class='btn btn-danger'  title='Excluir Usuário'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>-->
			</td>
		</tr>";
		}
		?>
	</table>
	</div> <!-- table-responsive -->
	</div> <!-- row(tabela)-->
</div> <!--container-fluid-->
<script>
	function Excluir(id_usuario){
		if(confirm("Tem certeza que deseja excluir este usuario?")){
			pagina = '../usuario/excluir_usuario?id_usuario=' + id_usuario;
			window.location = pagina;	
		}
		/*else{
			alert('Usuário nao foi excluído.');
		}*/
	}
</script>
<?php
include"../base/rodape.php";
?>