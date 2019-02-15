<?php
include"../base/conexao.php";
include"../base/controle.php";

$i = 14;

//$sql = "select * from post where id_post=$i";
$sql = "select a.id_post, a.conteudo, a.data_hora, a.curtidas, b.nome, b.foto, c.id_midia, d.arquivo, e.id_usuario ";
			$sql .= "from post as a ";
			$sql .= "LEFT JOIN usuario as b ";
			$sql .= "ON a.id_usuario = b.id_usuario ";
			$sql .= "LEFT JOIN curtir as e ";
			$sql .= "ON e.id_post = a.id_post and e.id_usuario = $id_usuario ";
			$sql .= "LEFT JOIN midia_post as c ";
			$sql .= "ON a.id_post = c.id_post ";
			$sql .= "LEFT JOIN midia as d ";
			$sql .= "ON c.id_midia = d.id_midia ";
			$sql .= "order by a.data_hora desc limit 1";
$seleciona = mysqli_query($conexao,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>teste php</title>
</head>
<body>
	<div class="row">
	<div class="col-lg-5 offset-lg-3">
	<?php while($dados = mysqli_fetch_array($seleciona)){?>
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
								<img class='icone-u-post' src='<?php echo $dados['foto'];?>' />
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
					
					<?php /*if($dados['arquivo']!=''){
					echo"<div class='row'>
						<div class='container-img-post borda-post'><img src='".$dados['arquivo']."' class='img-post'></div>
					</div>";
					}*/?>
					
					<div class="row"> <!--quantidade de curtidas e exibir comentarios-->
						<div class="col">
							<div class="texto-curtidas" id="tc<?php echo $dados['id_post'];?>"><?php echo $dados['curtidas'];?> Curtiram</div>
						</div>
					</div>
					
					<div class='row'>
						<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4 menu-post'>
						<div class="c-i-menu-post btn-post" id="curtir<?php echo $i;?>" onclick="curtir(<?php echo $i;?>)"><img class="icone-menu-post" id="ic<?php echo $i;?>" src="../img/curtir1.png"/>Curtir</div>
						</div>
						<div class='col-lg-4  col-md-4  col-sm-4 col-xs-4 menu-post'>
						<div class="c-i-menu-post btn-post"><img class="icone-menu-post" src="../img/comments1.png"/>Comentar</div>
						</div>
						<div class='col-lg-4  col-md-4  col-sm-4 col-xs-4 menu-post'>
						<div class="c-i-menu-post btn-post"><img class="icone-menu-post" src="../img/share1.png"/>Compartilhar</div>
						</div>
					</div>
					
					</div><!-- col-->
				</div> <!-- row -->
				<form name="form1" method="post" name="form" id="form1" action="curtir.php">
					<input type="hidden" name="id_post" value="<?php echo $i;?>">
				</form>
	<?php } ?>
	</div>
	</div>
	<script>
/*function curtir(cod){
	//alert(cod);
	$("#form1").submit();
}*/

function curtir(cod){
	//alert(cod);
	var a = "#curtir" + cod;
	var b = "#tc" + cod;
	var img = "#ic" + cod
	//var img = document.getElementById("ic");
	//alert(a);
	//alert(typeof(a));
	
	$(b).load("curtir.php", {id_post:cod}, function(){
		//alert("load success");
		$(a).css("color","#007bff");
		$(a).removeAttr("onclick");
		$(img).attr("src","../img/curtir2.png");
	});
}
</script>
</body>
</html>