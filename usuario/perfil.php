<?php
	include"../base/conexao.php";
	include"../base/controle.php";

	if(isset($_GET['id_usuario'])){
	$id_usuario = $_GET['id_usuario'];
	
	/*if($id_usuario)!=($_SESSION['id_usuario']){
		
	}*/
	
	$sql = "select * from usuario where id_usuario=$id_usuario";
	$seleciona = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
	
	$dados = mysqli_fetch_array($seleciona);
	
	//$i = $dados['id_post']; utilizado em "feed_usuario.php"
?>
<div id="body" class="container-fluid cor-fundo">
	<div class="row">
		<div class="col">
			<!-- inicio da capa -->
			<div class="row capa align-items-end" style="background-image: url(<?php echo $dados['capa'];?>)">
				<div class="col">
					<div class="row area-foto-nome">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-8 c-foto-perfil">
								<img src="<?php echo $dados['foto_perfil'] ?>" class="img-responsive foto-perfil" />
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
							<div class="container-nome-perfil">
								<div class="nome-perfil"><?php echo $dados['nome']; ?></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col sem-margem">
							<ul class="nav nav-pills nav-fill b-menu-perfil">
							  <li class="nav-item">
								<a class="nav-link" href='#'>Sobre</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link" onclick='exibir("amigos")' href='#'>Amigos</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link" onclick='exibir("pags")' href='#'>Páginas</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link" onclick='exibir("config")' href='#'>Configurações</a>
							  </li>
							</ul>
						</div>
					</div>
				</div><!--col-->
			</div><!--row-->
		</div>
	</div> <!-- row -->
	<div id="conteudo" class="row">
		<div class="offset-lg-1 col-lg-3 offset-md-1 col-md-3 offset-sm-1 col-sm-3 offset-xs-1 col-xs-2 emp">
			<div class="row">
				<div class="col">
					<div class="card espaco">
					  <h5 class="card-header">Apresentação</h5>
						  <div class="card-body">
							<!--<h5 class="card-title">Special title treatment</h5>-->
							<p class="card-text">Adicione uma Biografia em seu perfil para que as pessoas saibam quem você é</p>
							<!--<a href="#" class="btn btn-cor1">Go somewhere</a>-->
						  </div>
					</div>
						
					<div class="card espaco">
						<h5 class="card-header">Fotos</h5>
						<div class="card-body">
								
						</div>
					</div>
				</div>
			</div>			
		</div>
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
			<?php include "feed_usuario.php";?>
			<div class='row espaco'>
				<div class='col sem-margem sem-pad'>
					<button class='btn btn-lg btn-block btn-area-post'>Carregar mais posts</button>
				</div>
			</div>
			<div class="espaco"></div>
		</div>
	</div>
	
</div><!-- container-fluid -->
<!--<script>
function exibir(cod,area){
	switch (area){
		case "amigos":
		pag = "amigos.php";
		break;
		case "pags":
		pag = "paginas.php";
		break;
		case "config":
		pag = "config.php";
		break;
		default:
		return false;
	}
$("#conteudo").load(pag,{id_usuario=cod},function{
	
});
}
</script>-->
<?php
include"../base/rodape.php";
}
else{
	echo"<script>
		alert('Pagina não encontrada ou removida. Redirecionando...');
		window.location='../base/index.php';
	</script>";
}
?> 