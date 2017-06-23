<?php
session_start();
if(isset($_SESSION['logado'])=='1')
{
	header("Location: painel.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Moovs - entre ou cadastre-se</title>

		<!-- CSS -->
		<link rel="stylesheet" href="css/960.css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
		
		<!--<link href="style.css" rel="stylesheet" type="text/css" media="screen">-->
		
		<!-- Javascript -->
		<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
		
			<!-- Login -->
			<script type="text/javascript" src="js/validation.min.js"></script>
			<script type="text/javascript" src="js/login/script.js"></script>
			
			<!-- Cadastro -->
			<script type="text/javascript" src="js/cadastro/script.js"></script>
		

	</head>
	<body>
	<div class="geral">
		
		<div id="aleatorio"></div>
		<img src="images/effect.png" class="effect"/>
		
		<div class="container_12">			
			<div class="grid_6 prefix_6">
				<div class="blocologin"> 
				<form class="form-signin" method="post" id="login-form">
							<h1>Entrar</h1>
							<div id="error_login">
							<!-- error will be shown here ! -->
							</div>
							<div class="form-group">
								<i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>
								<input type="email" class="form-control" placeholder="Email" name="emailLogin" id="emailLogin" />
								<span id="check-e"></span>
							</div>
							<div class="form-group">
								<i class="fa fa-key fa-lg" aria-hidden="true"></i>
								<input type="password" class="form-control" placeholder="Senha" name="senhaLogin" id="senhaLogin" />
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
									<span class="glyphicon glyphicon-log-in"></span> &nbsp; Entrar
								</button> 
								<div class="cadastre">
									<a href="">Esqueceu sua senha? <b>Recupere</b></a>
								</div>
							</div>  
						</form>
				</div>
			</div>
			<div class="grid_6 suffix_6" style="height:0px; margin-top:-10%;">
				<div class="logohome">
					<img src="images/logo_branca.png" class="logo">
				</div>
			</div>
			<div class="grid_6 prefix_6">
				<div class="blococadastro"> 
				<form class="form-signin" method="post" id="cad-form">
							<h1>Cadastrar</h1>
							<div id="error_cadastro">
							<!-- error will be shown here ! -->
							</div>
							<div class="form-group">
								<i class="fa fa-user-o fa-lg" aria-hidden="true"></i>
								<input type="text" class="form-control" placeholder="Nome" name="nome" id="nome" />
								<input type="text" class="form-control" placeholder="Sobrenome" name="sobrenome" id="sobrenome" />
							</div>
							<div class="form-group">
								<i class="fa fa-envelope-o fa-lg"  aria-hidden="true"></i>
								<input type="email" class="form-control" placeholder="Email" name="email" id="email" />
								<span id="check-e"></span>
							</div>
							<div class="form-group">
								<i class="fa fa-key fa-lg" aria-hidden="true"></i>
								<input type="password" class="form-control" placeholder="Senha" name="senha" id="senha" />
							</div>
							
							<div class="form-group">
								<button type="submit" class="btn btn-default" name="btn-cad" id="btn-cad">
									<span class="glyphicon glyphicon-log-in"></span> &nbsp; Cadastrar
								</button> 
								<div class="termos">
									Ao clicar em Criar conta, você concorda com nossos <a href="">Termos</a> e que leu nossa <a href="">Política de Dados</a>, 
									incluindo nosso <a href="">Uso de Cookies</a>. Você pode receber notificações por SMS do Facebook e pode cancelar o recebimento a qualquer momento.
								</div>
							</div>  
						</form>
				</div>
			</div>
		</div>	
	</div>	
</div>
		<?php include 'rodape.php' ?>
	
	
	<script type="text/javascript">
		(function() {
			// Necessário declarar a variável img 
			var img = [ "images/home/bg1-min.jpg", 
						"images/home/bg2-min.jpg", 
						"images/home/bg3-min.jpg",
						"images/home/bg4-min.jpg",
						"images/home/bg5-min.jpg",
						"images/home/bg6-min.jpg",
						"images/home/bg7-min.jpg",
						"images/home/bg8-min.jpg",
						"images/home/bg9-min.jpg",
						"images/home/bg10-min.jpg",
						"images/home/bg11-min.jpg",
						"images/home/bg12-min.jpg",
						"images/home/bg13-min.jpg"];
			var mudar = Math.floor(Math.random() * img.length);
			//document.getElementById("aleatorio").innerHTML = "<img src='" + img[mudar] + "' class='mveffect'>";
			$("#aleatorio").html("<img src='" + img[mudar] + "' class='mveffect'>");
		  })();
	</script>

	</body>
</html>