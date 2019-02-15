<?php
if(!isset($_SESSION)){
	session_start();
}
include"../base/conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
   <head>
		<meta charset="utf-8" />
		 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>movement.org</title>
   </head>
   <body>
   <!-- declarando os arquivos css-->
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen"/>
	<link href="../css/estilo.css" rel="stylesheet" media="screen"/>
		
	<!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
	<!-- Jquery Slim (sem Ajax)-->
	<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	
	<nav class="navbar navbar-expand-lg navbar-light navbar-cor">
		<!--<div class="container-fluid">-->
		
			<!-- Brand and toggle get grouped for better mobile display -->
			<!--<div class="navbar-header">-->
			
			<a class="pull-left" href="../base/index.php"><img class="img-responsive logo" src="../img/logo.png"/></a>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			  <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>-->		
					
				
					
			<!--</div>-->
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<!--<li>Login</li>-->
					&nbsp; &nbsp; &nbsp; &nbsp;
					<?php
					//impedindo bug pelo nivel estar vazio
					$nivel = '';
					if(isset($_SESSION['nome'])){
						$id_usuario = $_SESSION['id_usuario'];
						$nome = $_SESSION['nome'];
						$email = $_SESSION['email'];
						$foto_perfil = $_SESSION['foto_perfil'];
						$nivel = $_SESSION['nivel'];
						
						echo"<form name='form1' class='form-inline' name='pesquisa' method='post' action='../base/pesquisa_global.php'>
							<div class='input-group'>
								<input type='text' class='form-control borda-pesquisa' name='busca' placeholder='Pesquisar' required/>
								<div class='input-group-append' onclick='form1.submit()'>
									<img class='icone-pesquisa borda-icone-pesquisa' src='../img/pesquisa1.png'/>
								</div>
							</div>
							</form>'";
						
						echo"<li class='nav-item dropdown'>
														
							<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>	
								<img src='$foto_perfil' class='img-login'/>
								<font size='2' class='link'>$nome</font><span class='caret'></span>
							</a>
							
							<div class='dropdown-menu' arialabelledby='navbarDropdown'>";
								
							if($nivel=='adm'){
								echo"<a class='dropdown-item' href='../base/inicio_adm.php'>Administrar Site</a>";
							}
							echo"<a class='dropdown-item' href='../usuario/perfil.php?id_usuario=$id_usuario'>Perfil</a>
							<a class='dropdown-item' href='../base/logout.php'>Sair</a>";
						echo"</div><!--dropdown menu-->
						</li><!--dropdown-->";
						
						echo"<li class='nav-item'><a class='nav-link' href='../base/pagina_inicial.php'>Pagina Inicial</a></li>";
						/*if($nivel=='adm'){
						
						}*/
					}
					else{
						echo'<li> <!-- menu para entrar igual no facebook -->
					   <form class="form-inline my-2 my-lg-0" name="entrar" method="post" action="../base/login.php">
						<div class="form-group">
							<label for="email">Email:&nbsp; &nbsp;</label>
							<input type="email" name="email" class="form-control" required>
							&nbsp; &nbsp;
							<label for="senha">Senha:&nbsp; &nbsp;</label>
							<input type="password" name="senha" class="form-control" required>
							
							&nbsp; &nbsp;
							<button type="submit" class="btn btn-primary">Entrar</button>
						</div>
					   </form>
					</li>
					&nbsp; &nbsp; &nbsp; &nbsp;
					<li class="nav-item">
						<a class="btn btn-primary" href="../usuario/cadastrar_usuario.php?nivel=<?php echo $nivel;?>">Cadastre-se</a>
					</li>';
					}
					?>

				</ul>
			</div> <!--navbar-collapse-->
		<!--</div>--><!--container-fluid-->
	</nav>
<div id="holder">
<!--<div id="body">-->