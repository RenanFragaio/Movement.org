<?php
include"../base/conexao.php";
include"../base/controle.php";

?>
<div class="row">
	<div class="col-lg-8 offset-lg-2 col-md-4 offset-md-2 col-sm-4 offset-md-2 hidden-xs">
		<div class="row">
			<div class="col">
				<div class="titulo-config"><img class="icone-menu-post" src="../img/config.png">Configurações</div>
			</div>
		</div>
		<div class="row">		
			<div class="col">
				<div class="list-group">
					<a href="../usuario/editar_usuario.php?id_usuario=<?php echo $id_usuario;?>" class="list-group-item list-group-item-action">
					Alterar dados da Conta<!--<img class="icone-menu-post" src="../img/edit-solid.png">--></a>
				</div>
			</div>
		</div>
	</div>
</div>