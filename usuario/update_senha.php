<?php
	include"../base/conexao.php";
	
	if(isset($_POST['id_usuario'])){
	$id_usuario = $_POST['id_usuario'];
	$senha_antiga = $_POST['senha_antiga'];
	$senha1 = $_POST['senha1'];
	$senha2 = $_POST['senha2'];
	
	$sql = "select senha from usuario where senha='$senha_antiga' and id_usuario = '$id_usuario'";
	$seleciona = mysqli_query($conexao,$sql);
	
	$existe = mysqli_num_rows($seleciona);
	
	$dados = mysqli_fetch_array($seleciona);
	
		if($existe){
			if($senha1==$senha2){
				
				$sql = "update usuario set senha = '$senha2' where id_usuario = $id_usuario";
				$atualiza = mysqli_query($conexao,$sql);
			
					if($atualiza){
						echo "<script>
							alert('Dados Atualizados com Sucesso!!');
							window.location='../usuario/lista_usuario.php';      
							</script>";
					}
					else{
						echo"<script>
							alert('Erro ao atualizar o Banco de Dados. Tente Novamente Mais Tarde ou Contate o Administrador do Site');
							history.go(-1);  
							</script>";
					}
			}
			else{
				echo"<script>alert('As novas senhas digitadas não coincidem.');
			history.go(-1);
			</script>";
			}
		}
		else{
			echo"<script>alert('A senha atual digitada não Corresponde à senha deste Usuário.');
			history.go(-1);
			</script>";
		}
	}
    else{
        echo "<script>
            alert('Página Não Encontrada ou Removida. Redirecionando...');
            window.location = '../base/index.php';
        </script>";
    }
?>

