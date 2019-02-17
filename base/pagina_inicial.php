<?php
include"../base/conexao.php";
include"../base/seguranca_u.php";
include"../base/controle.php";

/*$sql = "select * from post";
$seleciona = mysqli_query($conexao,$sql);*/
?>
<!-- função javascript que mostra o tamanho da tela -->
<!--<script>
	var largura = window.innerWidth;
	var altura = window.innerHeight;
	alert("Largura:" + largura + "  Altura:" + altura);
</script>-->
<script>
function curtir(cod){
	
	//alert(cod);
	var a = "#curtir" + cod;
	var b = "#tc" + cod;
	var img = "#ic" + cod;
	//var img = document.getElementById("ic");
	//alert(a);
	//alert(typeof(a));
	
	$(b).load("../post/curtir.php", {id_post:cod}, function(){
		//alert("load success");
		//$(a).css("color","#007bff");
		$(a).addClass("cor-curtir");
		$(a).removeAttr("onclick");
		$(img).attr("src","../img/curtir2.png");
	});
}

$(document).ready(function(){
	$("#texto").focus(function(){
		$("#texto").attr('rows', '10');
	});
	$("#texto").focusout(function(){
		$("#texto").attr('rows', '3');
	});
});

</script>
<div id="body" class="container-fluid cor-fundo">
	<div class="row pad-top">
		<div class="col-lg-3 col-md-3 col-sm-12 col-12">
			<ul class="list-group list-group-flush"><!-- passado id do usuario da sessão que está logada-->
				<a href="../usuario/perfil.php?id_usuario=<?php echo $id_usuario;?>" class="list-group-item list-group-item-action">Perfil</a>
				<a href="../base/pagina_inicial.php" class="list-group-item list-group-item-action">Feed de Notícias</a>
				<a href="#" class="list-group-item list-group-item-action">Páginas</a>
				<a href="#" class="list-group-item list-group-item-action">Grupos</a>
			</ul>
		</div>
		<!--<div class="offset-lg-3 col-lg-5 offset-md-2 col-md-7 offset-sm-1 col-sm-9 offset-xs-0 col-xs-12">-->
		<div class="col-lg-5 col-md-7 col-sm-12 col-12">
			<div class="row">
				<div class="col">
					<form name="post1" method="post" action="../post/postar.php" enctype="multipart/form-data">
						<label><b>Criar Publicação</b></label>
						
						<textarea  rows="3" id="texto" class="form-control" name="conteudo" onclick="texto()" required></textarea>
						
						<label for="upload-imagem" class="btn btn-primary fix">Adicionar imagem</label>
						<input type="file" name="imagem" id="upload-imagem" />
						
						<!-- passando o id do usuario responsavel pelo post-->
						<input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>" />
						
						<button type="submit" class="btn btn-success">Postar</button>
					</form>
				</div>
			</div>
			
			<?php 
			//$sql = "select a.id_post, a.conteudo, a.imagem, b.nome, b.foto_perfil from post a,usuario b where a.id_usuario=b.id_usuario order by id_post desc limit 4";
			/*$sql = "select a.id_post, a.conteudo, a.data_hora, a.curtidas, b.nome, b.foto_perfil, c.id_midia, d.arquivo, e.id_usuario ";
			$sql .= "from post as a ";
			$sql .= "LEFT JOIN usuario as b ";
			$sql .= "ON a.id_usuario = b.id_usuario ";
			$sql .= "LEFT JOIN curtir as e ";
			$sql .= "ON e.id_post = a.id_post and e.id_usuario = $id_usuario ";
			$sql .= "LEFT JOIN midia_post as c ";
			$sql .= "ON a.id_post = c.id_post ";
			$sql .= "LEFT JOIN midia as d ";
			$sql .= "ON c.id_midia = d.id_midia ";
			$sql .= "order by a.data_hora desc limit 10";
			$seleciona = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
			
			//$i = 0; //código dos botoes
			while ($dados = mysqli_fetch_array($seleciona)){
				
				//$i = $i + 1;
				$i = $dados['id_post'];*/
				include"feed_noticias.php";
			?>
				
				
			<?php //} //while ?>
				<div class='row espaco'>
					<div class='col sem-margem sem-pad'>
						<button class='btn btn-lg btn-block btn-area-post'>Carregar mais posts</button>
					</div>
				</div>
				<div class="espaco"></div>
		</div><!-- col-lg-5 -->
	</div><!--row-->
</div><!--container-fluid-->
<?php include"rodape.php";?>