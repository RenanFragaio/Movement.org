<?php

if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id_usuario'])){
    
    echo "<script>
            alert('Área restrita a usuários logados.');
            window.location = '../base/index.php';
        </script>";
}
//caso possua níveis de acesso diferenciados é necessário verificar o nível do usuário para bloquear o acesso.
else{
    $nivel = $_SESSION['nivel'];
	    
	if($nivel!='adm'){
        echo"
		<script>
            alert('Área restrita a administradores');
            window.location = '../base/index.php';
        </script>";
    }
}
?>