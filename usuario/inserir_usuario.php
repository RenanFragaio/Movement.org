<?php
include"../base/conexao.php";

if(isset($_POST['email'])){

	$email = $_POST['email'];
	$nome = $_POST['nome'];
	$data_nasc = $_POST['data_nasc'];
	$senha1 = $_POST['senha1'];
	$senha2 = $_POST['senha2'];
	
	$nivel_cadastrando = $_POST['nivel_cadastrando'];
	$nivel = $_POST['nivel'];
	
	if($nivel_cadastrando=='adm'){
		$pag = "../usuario/lista_usuario.php";
	}
	else{
		$pag = "../base/pagina_inicial.php"; //deve ser trocada para a pagina do perfil do usuario.
	}
	
	if($_FILES['foto_perfil']['name']==''||$_FILES['foto_perfil']['tmp_name']==''){
		
		$foto = '../usuario/foto/semfoto.jpg';
		$upload = '';
	}
	else{
	//recebendo uma foto
	$nome_foto = $_FILES['foto_perfil']['name'];
	$caminho_tmp = $_FILES['foto_perfil']['tmp_name'];
	$caminho = '../usuario/foto/';
	
	$foto = $caminho . $nome_foto;
	
	$upload = move_uploaded_file($caminho_tmp,$foto);
	}
	
	if($senha1==$senha2){
		
		$sql = 'select email from usuario where email="$email"';
		$verifica = mysqli_query($conexao,$sql);
		$linhas = mysqli_num_rows($verifica);
		
		if($linhas==0){
			$sqlf = "insert into usuario(email,nome,data_nasc,senha,foto_perfil,nivel) values('$email','$nome','$data_nasc','$senha1','$foto','$nivel')";
			$insere = mysqli_query($conexao,$sqlf);
			
			if($insere){
				if($foto!='../usuario/foto/semfoto.jpg'){
					$upload;
				}
				
				echo"<script>
				alert('Usuario Cadastrado com Sucesso!');
				window.location='$pag';
				</script>";
				
				if($nivel_cadastrando!='adm'){
					$sql = "select id_usuario,nome,email,foto_perfil,nivel from usuario where email='$email'";
					$dados_login = mysqli_query($conexao,$sql);
					
					$exibe = mysqli_fetch_array($dados_login);
					
					if(!isset($_SESSION)){
					session_start();
					$_SESSION['id_usuario'] = $exibe['id_usuario'];
					$_SESSION['nome'] = $exibe['nome'];
					$_SESSION['foto_perfil'] = $exibe['foto_perfil'];
					$_SESSION['nivel'] = $exibe['nivel'];
					$_SESSION['email'] = $exibe['email'];
					}
				}
			}
			else{
				echo mysqli_error($conexao);
					echo"<script>
					alert('Houve um problema ao inserir os dados. Tente novamente mais tarde ou contate o administrador do site.');
					//history.go(-1);
					</script>";
			}
		}
		else if($linhas==1){
			echo"<script>
				alert('O email informado já existe cadastrado em outro usuário. Informe um email diferente.');
				history.go(-1);
			</script>";
		}
		else{
			echo"<script>
				alert('Houve um problema na verificação do email. Tente novamente mais tarde ou contate o administrador do site.');
				history.go(-1);
				</script>";
		}
	}
	else if($senha1!=$senha2){
		echo"<script>
				alert('As senhas não coincidem.');
				history.go(-1)
			</script>";
	}
	else{
		echo mysqli_error($conexao);
			echo"<script>
				alert('Houve um problema na verificação da senha. Tente novamente mais tarde ou contate o administrador do site.');
				history.go(-1);
				</script>";
	}
}
else{
	echo"<script>
            alert('Área restrita a usuários administradores. Retornando à Página de Login.');
            window.location = '../base/pagina_login.php';
        </script>";
}
?>
