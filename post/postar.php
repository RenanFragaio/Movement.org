<?php
include"../base/conexao.php";

if(isset($_POST['conteudo'])){
	$conteudo = $_POST['conteudo'];
	$id_usuario = $_POST['id_usuario'];
	$curtidas = 0;
	
	date_default_timezone_set('America/Sao_Paulo');
	$data_hora = date("Y/m/d - H:i:s");
	
	if($_FILES['imagem']['name']==''||$_FILES['imagem']['tmp_name']==''){
		$upload = '';
		$sql = "insert into post(id_usuario,conteudo,data_hora,curtidas) values('$id_usuario','$conteudo','$data_hora','$curtidas')";
	}
	else{
	//recebendo a foto
	$nome_foto = $_FILES['imagem']['name'];
	$caminho_tmp = $_FILES['imagem']['tmp_name'];
	$caminho = '../post/img/';
	
	$foto = $caminho . $nome_foto;
	$upload = move_uploaded_file($caminho_tmp,$foto);
	
	$sql = "insert into post(id_usuario,conteudo,imagem,data_hora,curtidas) values('$id_usuario','$conteudo','$foto','$data_hora','$curtidas')";
	}
	
	$insere = mysqli_query($conexao,$sql);
	
	if($insere){
		$upload;
		echo"<script>
				alert('Postado com Sucesso!');
				window.location='../base/pagina_inicial.php';
			</script>";
	}	
	else{
		echo mysqli_error($conexao);
		echo"<script>
            alert('Erro: Não foi possível concluir a postagem. Tente novamente mais tarde');
            /*window.location = '../base/pagina_inicial.php';*/
        </script>";
	}
}
else{
	echo"<script>
            alert('Erro: Página Não encontrada ou removida. Redirecionando...');
            window.location = '../base/pagina_inicial.php';
        </script>";
}
?>