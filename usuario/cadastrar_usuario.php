<?php
	include"../base/controle.php";

	if(isset($_GET['nivel'])){
		$nivel_cadastrando = $_GET['nivel'];
	}
	else{
		$nivel_cadastrando='basico';
	}
?>
<div id="body" class="container-fluid">

	<div class="row pad-top">
		<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-0 col-xs-12">		
		
			<form name="cadastro" method="post" action="../usuario/inserir_usuario.php" enctype="multipart/form-data">

				<div class="form-group">
					<label>Nome:</label>
					<input class="form-control" type="text" name="nome" required />
				</div>
				<div class="form-group">
					<label>Data de Nascimento</label>
					<input  class="form-control" type="date" name="data_nasc" required />
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input class="form-control" type="email" name="email" required />
				</div>
				<div class="form-group">
					<label>Senha:</label> 
					<input class="form-control" type="password"  pattern=".{6,20}" id='s1' name="senha1" required />
					<small id="passwordHelpBlock" class="text-muted">
						Deve possuir de 6 a 20 caracteres.
					</small>
				</div>
				<div class="form-group">
					<label>Confirmar Senha:</label>
					<input class="form-control" type="password" pattern=".{6,20}" id='s2' name="senha2" required />
					
					<div id="div-senha">
					
					</div>
				</div>
				<div class="form-group">
					<label>Foto de Perfil:</label>
					<input class="form-control-file" type="file" name="foto_perfil" />
				</div>
				
				<!--nivel do usuario-->
				<input type="hidden" name="nivel_cadastrando" value="<?php echo $nivel_cadastrando; ?>" />
				
				<!-- se for administrador, pode adicionar um nível-->
				<?php
					if($nivel_cadastrando == 'adm'){
					echo"<div class='form-group'>
					<label>Nível de Usuário:</label>
					<select name='nivel' class='form-control' required> <!--onchange='nivelfoto()'-->
						<option></option>
						<option>adm</option>
						<option>basico</option>
					</select>
				</div>";
					}
					else{
						echo"<input type='hidden' id='nv' name='nivel' value='basico'>";
					}
				?>
				
				<div class="form-group">
					<button type="submit" class="btn btn-success" <!--onclick="envio()"-->confirmar</button>
				</div>
					<!--<button onClick="envio()" class="btn btn-primary">Confirmar</button>-->
					<!--<button class="btn btn-success" type="submit">Confirmar</button>-->
			</form>
		</div> <!--col-->
	</div> <!-- row -->
</div> <!-- container-fluid -->
<script>
function checar_senha(){
	var senha1 = $('#s1').val();
	var senha2 = $('#s2').val();
	
	if(senha1!=senha2){
		$('#div-senha').html("As Senhas não coincidem.");
	}
	else{
		$('#div-senha').html("As senhas coincidem.");
	}
}

$(document).ready(function (){
	$("#s1","#s2").keyup(checar_senha);
});
</script>
<?php
include"../base/rodape.php";
?>