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
</script>
<div class="container-fluid cor-fundo">
	<div class="row pad-top">
		<div class="col-lg-3 col-md-2 col-sm-1 col-xs-0">
			<ul class="list-group list-group-flush"><!-- passado id do usuario da sessão que está logada-->
				<a href="../usuario/perfil.php?id_usuario=<?php echo $id_usuario;?>" class="list-group-item list-group-item-action">Perfil</a>
				<a href="../base/pagina_inicial.php" class="list-group-item list-group-item-action">Feed de Notícias</a>
				<a href="#" class="list-group-item list-group-item-action">Páginas</a>
				<a href="#" class="list-group-item list-group-item-action">Grupos</a>
			</ul>
		</div>
		<!--<div class="offset-lg-3 col-lg-5 offset-md-2 col-md-7 offset-sm-1 col-sm-9 offset-xs-0 col-xs-12">-->
		<div class="col-lg-5 col-md-7 col-sm-9 col-xs-12">
			<div class="row">
				<div class="col">
					<form name="post1" method="post" action="../post/postar.php" enctype="multipart/form-data">
						<label><b>Criar Publicação</b></label>
						
						<textarea class="form-control" name="conteudo" required></textarea>
						
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
			$sql = "select a.id_post, a.conteudo, a.data_hora, a.curtidas, b.nome, b.foto_perfil, c.id_midia, d.arquivo, e.id_usuario ";
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
				$i = $dados['id_post'];
			?>
				<div class="row espaco area-post borda-post">
					<div class="col">
				
					<!--<div class='row'>
						<div class="col">
							<img class='icone-post' src='<?php /*echo $dados['foto'];?>'>
							<p class='nome-post'><?php echo $dados['nome'];?></p><br>
							<small class='data-post'><?php echo date('d/M/y ',strtotime($dados['data']));*/?></small>
						</div>
					</div>-->
					
					<div class='row pad-top'>
						<div class="col">
							<div class="c-icone-u-post">
								<img class='icone-u-post' src='<?php echo $dados['foto_perfil'];?>' />
							</div>
							<div class="c-info-post">
								<div class='nome-post'><?php echo $dados['nome'];?></div>
								<div class='data-post'><?php echo date('d/M/y - H:i:s',strtotime($dados['data_hora']));?></div>
							</div>
						</div>
					</div>
					
					<div class='row'>
						<div class='col sem-margem sem-pad'>
						<div class='conteudo-post'><?php echo $dados['conteudo'];?></div>
						</div>
					</div>
					
					<?php if($dados['arquivo']!=''){
					echo"<div class='row'>
						<div class='container-img-post borda-post'><img src='".$dados['arquivo']."' class='img-post'></div>
					</div>";
					}?>
					
					<div class="row"> <!--quantidade de curtidas e exibir comentarios-->
						<div class="col">
							<div class="texto-curtidas" id="tc<?php echo $i;?>"><?php echo $dados['curtidas'];?> Curtiram</div>
						</div>
					</div>
					
					<?php /*echo"<br>"; echo $dados['id_usuario'];*/?>
					
					<div class='row'>
						<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4 menu-post rd-e'>
						<?php
						if(!$dados['id_usuario']){
							echo'<div class="c-i-menu-post btn-post" id="curtir'.$i.'" onclick="curtir('.$i.')">
							<img class="icone-menu-post" id="ic'.$i.'" src="../img/curtir1.png"/>Curtir</div>';
						}
						else{
							echo'<div class="c-i-menu-post btn-post cor-curtir" id="curtir'.$i.'">
							<img class="icone-menu-post" id="ic'.$i.'" src="../img/curtir2.png"/>Curtir</div>';
						}
						
						?>
						</div> <!-- col - botao curtir -->
						<div class='col-lg-4  col-md-4  col-sm-4 col-xs-4 menu-post'>
						<div class="c-i-menu-post btn-post"><img class="icone-menu-post" src="../img/comments1.png"/>Comentar</div>
						</div>
						<div class='col-lg-4  col-md-4  col-sm-4 col-xs-4 menu-post rd-d'>
						<div class="c-i-menu-post btn-post"><img class="icone-menu-post" src="../img/share1.png"/>Compartilhar</div>
						</div>
					</div>
					
					</div><!-- col-->
				</div> <!-- row -->
				
			<?php } //seleciona?>
				<div class='row espaco'>
					<div class='col sem-margem sem-pad'>
						<button class='btn btn-lg btn-block btn-area-post'>Carregar mais posts</button>
					</div>
				</div>
		</div>
	</div>
	<!--<div class="row pad-top">-->
		<!--<div class="offset-lg-3 col-lg-5 offset-md-2 col-md-7 offset-sm-1 col-sm-9 offset-xs-0 col-xs-12">-->
		<!--<div class="col-lg-5 col-md-7 col-sm-9 col-xs-12">
			<?php /*while($dados = mysqli_fetch_array($seleciona)){*/?>
		</div>
	<!--</div>-->
</div>
<?php include"rodape.php";?>