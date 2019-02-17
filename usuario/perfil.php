<?php
	include"../base/conexao.php";
	include"../base/controle.php";

	if(isset($_GET['id_usuario'])){
	$id_usuario = $_GET['id_usuario']; //id do usuario do qual eu estou vendo o perfil
	
	/*if($id_usuario)!=($_SESSION['id_usuario']){
		
	}*/
	
	$sql = "select * from usuario where id_usuario=$id_usuario";
	$seleciona = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
	
	$dados = mysqli_fetch_array($seleciona);
	
	//$i = $dados['id_post']; utilizado em "feed_usuario.php"
?>
<div id="body" class="container-fluid cor-fundo">
	<div class="row">
		<!--<div class="offset-xl-1 col-xl-8 offset-lg-1 col-lg-8 offset-md-0 col-md-12 offset-sm-0 col-sm-12 offset-0 col-12">-->
		<div class="col">
			<!-- inicio da capa -->
			<div class="row capa align-items-end" style="background-image: url(../usuario/capa/abstract-architecture-attractive-988873.jpg); box-shadow: inset 0 -210px 210px -210px #000000;">
				<div class="col">
					<div class="row area-foto-nome">
						<div class="offset-xl-5 col-xl-2 offset-lg-4 col-lg-4 offset-md-4 col-md-4 offset-sm-4 col-sm-4 offset-0 col-12 c-foto-perfil">
								<img src="<?php echo $dados['foto_perfil'] ?>" class="foto-perfil" />
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="container-nome-perfil">
								<div class="nome-perfil"><?php echo $dados['nome']; ?></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col sem-margem">
							<ul class="nav nav-pills nav-fill b-menu-perfil" id="pills-tab" role="tablist">
							  <li class="nav-item">
								<a class="nav-link" id="pills-sobre-tab" data-toggle="pill" href='#pills-sobre' role="tab" aria-controls="pills-sobre" aria-selected="true">Sobre</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link" id="pills-amigos-tab" data-toggle="pill" href='#pills-amigos' role="tab" aria-controls="pills-amigos" aria-selected="false">Amigos</a>
							  </li>
							  <!--<li class="nav-item">
								<a class="nav-link" id="pills-fotos-tab" data-toggle="pill" href='#pills-fotos' role="tab" aria-controls="pills-fotos" aria-selected="false">Fotos</a>
							  </li>-->
							  <li class="nav-item">
								<a class="nav-link" id="pills-pags-tab" data-toggle="pill" href='#pills-pags' role="tab" aria-controls="pills-pags" aria-selected="false">Páginas</a>
							  </li>
							  <?php
							  if($id_usuario==$_SESSION['id_usuario']){
							  echo'<li class="nav-item">
								<a class="nav-link" id="pills-config-tab" data-toggle="pill" href="#pills-config" role="tab" aria-controls="pills-config" aria-selected="false">Configurações</a>
							  </li>';
							  }
							  else{
								  echo'<li class="nav-item">
								<a class="nav-link" id="add" href="#">Adicionar como amigo</a>
							  </li>';
							  }
							  ?>
							</ul>
						</div>
					</div>
				</div><!--col-->
			</div><!--row-->
		</div>
	</div> <!-- row -->
	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-sobre" role="tabpanel" aria-labelledby="pills-sobre-tab">
		<div class="row">
			<div class="offset-lg-1 col-lg-3 offset-md-0 col-md-12 offset-sm-0 col-sm-12 offset-0 col-12">
				<div class="row">
					<div class="col">
						<div class="card espaco-m">
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
			<div class="offset-lg-0 col-lg-5 offset-md-1 col-md-10 offset-sm-0 col-sm-12 offset-0 col-12">
				<?php include "feed_usuario.php";?>
				<!--<div class="row espaco">
					<div class="col margem-post cor1">
						alguma coisa
					</div>
				</div>-->
				<div class='row espaco'>
					<div class='col sem-margem sem-pad'>
						<button class='btn btn-lg btn-block btn-area-post'>Carregar mais posts</button>
					</div>
				</div>
				<div class="espaco"></div>
			</div>
		</div>
		</div>
		<div class="tab-pane fade" id="pills-amigos" role="tabpanel" aria-labelledby="pills-amigos-tab">
			amigos
		</div>
		<div class="tab-pane fade" id="pills-pags" role="tabpanel" aria-labelledby="pills-amigos-tab">
			paginas
		</div>
		<div class="tab-pane fade" id="pills-config" role="tabpanel" aria-labelledby="pills-amigos-tab">
			configuracoes
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