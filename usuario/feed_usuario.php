<?php
/*$sql =  "select * from post as a ";
$sql .= "INNER JOIN post as b ";
$sql .= "ON (a.id_usuario = $id_usuario) and ($id_usuario = b.id_usuario) ";*/

/*$sql .= "INNER JOIN midia_post as c ";
$sql .= "ON (b.id_post = c.id_post) ";
$sql .= "INNER JOIN midia as d ";
$sql .= "ON (c.id_midia = d.id_midia) ";
$sql .= " curtir as e ";
$sql .= "ON (b.id_post = e.id_post) ";*/

$sql = "select a.nome, a.foto_perfil, b.*, c.id_midia, d.arquivo, e.id_usuario from usuario as a ";
$sql .= "INNER JOIN post as b ";
$sql .= "ON (a.id_usuario = $id_usuario) and ($id_usuario = b.id_usuario) ";
$sql .= "LEFT JOIN curtir as e ";
$sql .= "ON (e.id_post = b.id_post and e.id_usuario=$id_usuario)";
$sql .= "LEFT JOIN midia_post as c ";
$sql .= "ON (c.id_post = b.id_post) ";
$sql .= "LEFT JOIN midia as d ";
$sql .= "ON (c.id_midia = d.id_midia) ";

$seleciona = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

while($dados = mysqli_fetch_array($seleciona)){
	$i = $dados['id_post'];
?>
<div class="row espaco">
	<div class="col area-post borda-post2">
		<div class="row pad-top borda-v borda-esq-dir">
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
		
		<div class='row borda-esq-dir'>
			<div class='col sem-margem sem-pad'>
			<div class='conteudo-post'><?php echo $dados['conteudo'];?></div>
			</div>
		</div>
		
		<?php if($dados['arquivo']!=''){
			//echo $dados['id_midia'];
		echo"<div class='row borda-esq-dir'>
			<div class='container-img-post borda-post'><img src='".$dados['arquivo']."' class='img-post'></div>
		</div>";
		}?>
		
		<div class="row borda-esq-dir"> <!--quantidade de curtidas e exibir comentarios-->
			<div class="col">
				<div class="texto-curtidas" id="tc<?php echo $i;?>"><?php echo $dados['curtidas'];?> Curtiram</div>
			</div>
		</div>
		
		<?php /*echo"<br>"; echo $dados['id_usuario'];*/?>
		
		<div class='row'>
			<div class="col sem-margem sem-pad">
				<div class="nav nav-pills nav-justified b-menu-post rd-d rd-e">
					<div class="nav-item c-i-menu-post rd-e"><img class="icone-menu-post" src="../img/curtir1.png"/>Curtir</div>
					<div class="nav-item c-i-menu-post"><img class="icone-menu-post" src="../img/comments1.png"/>Comentar</div>
					<div class="nav-item c-i-menu-post rd-d"><img class="icone-menu-post" src="../img/share1.png"/>Compartilhar</div>
				</div>
			</div>
			
			<!--<div class='col-lg-4 col-md-4 col-sm-4 col-4 menu-post rd-e'>
			<?php
			/*if(!$dados['id_usuario']){
				echo'<div class="c-i-menu-post btn-post" id="curtir'.$i.'" onclick="curtir('.$i.')">
				<img class="icone-menu-post" src="../img/comments1.png"/>Curtir</div>';
			}
			else{
				echo'<div class="c-i-menu-post btn-post cor-curtir" id="curtir'.$i.'">
				<img class="icone-menu-post" id="ic'.$i.'" src="../img/curtir2.png"/>Curtir</div>';
			}*/
			
			?>
			</div> <!-- col - botao curtir -->
			<!--<div class='col-lg-4  col-md-4  col-sm-4 col-4 menu-post'>
			<div class="c-i-menu-post btn-post"><img class="icone-menu-post" src="../img/comments1.png"/>Comentar</div>
			</div>
			<div class='col-lg-4  col-md-4  col-sm-4 col-4 menu-post rd-d'>
			<div class="c-i-menu-post btn-post"><img class="icone-menu-post" src="../img/share1.png"/>Compartilhar</div>
			</div>-->
		</div>				
	</div><!-- col-->
</div> <!-- row -->
<?php 
}//while
?>