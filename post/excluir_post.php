<?php
	include"../base/conexao.php";
	include"../base/controle.php";
	
	if(isset($_GET['id_usuario'])){
		$id_usuario = $_GET['id_usuario'];
		
		$sql1 = "select nivel from usuario where id_usuario='$id_usuario' limit 1";
		$seleciona1 = mysqli_query($conexao,$sql1);
		
		$dado = mysqli_fetch_assoc($seleciona1);
		
		$nivel = implode($dado,"");
		
		//testando qual usuario que esta na sessão
		$sessao = $_SESSION['id_usuario'];
		//echo"<script>alert('".$sessao."')</script>";
			
		if($id_usuario==$sessao){
			echo"<script>
					alert('Não é possível excluir o usuário atual.');
					history.go(-1);
				</script>";
		}
		else{
			if(($nivel=='adm')&&($id_usuario==1)){
				
				echo"<script>
					alert('Não é possível excluir a conta administradora principal do sistema.');
					history.go(-1);
				</script>";
			}
			else{		
				$sql = "delete from usuario where id_usuario=$id_usuario";
				$deleta = mysqli_query($conexao,$sql);
				
				if($deleta){
					echo"<script>
					alert('Usuário excluído com sucesso.');
					window.location='../usuario/lista_usuario.php';
				</script>";
				}
				else{
					echo mysqli_error($conexao);
					echo"<script>
					alert('Erro. Não foi possível excluir este usuário. Tente novamente mais tarde ou contate o administrador do sistema.');
					history.go(-1);
				</script>";
				}
			}
		}//else
	}
	else{
		echo"<script>
			alert('Página Não Encontrada ou Removida. Retornando à Página Inicial');
			window.location='../base/index.php';
		</script>";
	}
?>