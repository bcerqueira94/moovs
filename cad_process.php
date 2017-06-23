<?php
	include 'conexao.php';
	
	$sql = "INSERT INTO usuario(nome, sobrenome, email, senha) VALUES ('$nome','$sobrenome','$email','$senha')";
    mysql_query($sql) or die("falha no insert<br>".mysql_error());
	

	if(isset($_POST['btn-cad']))
	{
		
		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$email = $_POST['email'];
		$senha = md5($_POST['senha']);
		
		try
		{	
		
			$query_select = "SELECT email FROM usuario WHERE email = '$email'";
			$select = mysql_query($query_select,$conexao);
			$array = mysql_fetch_array($select);
			$logarray = $array['email'];
			
			
			if($logarray == $email){
				echo "Email já está em uso"; // wrong details 
			}
			else{
				$sql = mysql_query("INSERT INTO usuario(nome, sobrenome, email, senha) VALUES ('$nome','$sobrenome','$email','$senha')");
				echo "ok"; // log in
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>