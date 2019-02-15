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
?>