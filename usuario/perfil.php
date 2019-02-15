<?php
	include"../base/conexao.php";
	include"../base/controle.php";

	if(isset($_GET['id_usuario'])){
	$id_usuario = $_GET['id_usuario'];
	
	$sql = "select * from usuario where id_usuario=$id_usuario";
	$seleciona = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
	
	$dados = mysqli_fetch_array($seleciona);
	
	//$i = $dados['id_post'];
?>
<div class="container-fluid">
	<div class="row">
		<div class="offset-lg-1 col-lg-8 offset-md-1 col-md-8 offset-sm-1 col-sm-8 offset-xs-0 col-xs-12"> 
		<!-- inicio da capa -->
		<div class="row capa align-items-end">
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
					<div class="col-lg-2 menu-perfil">
						<a class='link-perfil' href=''>Sobre</a>
					</div>
					<div class="col-lg-2 menu-perfil">
						<a class='link-perfil' href=''>Amigos</a>
					</div>
					<div class="col-lg-2 menu-perfil">
						<a class='link-perfil' href=''>Páginas</a>
					</div>
					<div class="col-lg-2 menu-perfil">
						<a class='link-perfil' href=''>Fotos</a>
					</div>
					<div class="col-lg-2 menu-perfil ultimo">
						<a class='link-perfil' href='../usuario/config_usuario.php'>Configurações</a> 
					</div>
				</div>
			</div><!--col-->
		</div><!--row-->
		</div> <!-- coluna da capa-->
	</div> <!-- row -->
	<div class="row">
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
				
					<!--<div class="nome-post">Apresentação</div>
					<div class="bio">
					<?php
						/*if(!$dados['bio']){
							echo"Adicione uma Biografia em seu perfil para que as pessoas saibam quem você é.";
						}*/
					?>
					</div>
				</div>
			</div>
			<div class="row justify-content-center espaco">
				<div class="col-lg-10 borda-post">
					<div class="nome-post">Fotos</div>
					<div class="foto1"></div>
				</div>
			</div>
		</div>-->
		</div>
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
		
		<!--<div class="col-lg-5 offset-lg-3 col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-xs-12">-->
			<?php include "feed_usuario.php";?>
		</div>
	</div>
</div><!-- container-fluid -->
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