<?php
include"../base/conexao.php";
include"../base/controle.php";

if(isset($_POST['busca'])){
$busca = $_POST['busca'];

$sql = "select id_usuario,nome,foto_perfil from usuario where nome like '%$busca%'";
$seleciona = mysqli_query($conexao,$sql);

$existe = mysqli_num_rows($seleciona);
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-md-2 col-sm-1 col-xs-0">
			<ul class="list-group list-group-flush">
				<a href="../usuario/perfil.php?id_usuario=" class="list-group-item list-group-item-action">Usuarios</a>
				<a href="../base/pagina_inicial.php" class="list-group-item list-group-item-action">Publicações</a>
				<a href="#" class="list-group-item list-group-item-action">Fotos</a>
				<a href="#" class="list-group-item list-group-item-action">Grupos</a>
			</ul>
		</div>
		<div class="col-lg-5 col-md-7 col-sm-9 col-xs-12">
	<?php if($existe){
		while($dados = mysqli_fetch_array($seleciona)){ ?>
			<div class="row espaco">
				<div class="col">
				<a href="../usuario/perfil.php?id_usuario=<?php echo $dados['id_usuario'];?>">
					<div class="c-icone-u-post">
						<img class="icone-u-post" src="<?php echo $dados['foto_perfil'];?>" />
					</div>
					<div class="c-info-post">
						<div class='nome-post'><?php echo $dados['nome'];?></div>
					</div>
				</a>
				</div>
			</div>
	<?php }
	}
	else{
		echo"<div class='espaco'><b>Nenhum resultado Encontrado</b></div>";
	}?>
		</div>
	</div><!-- row -->
</div> <!--container-fluid-->

<?php
}
else{
echo"<script>
	alert('Pagina Não Encontrada ou Removida. Redirecionando...');
	window.location='../base/index.php';
</script>";
}?>