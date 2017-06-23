<?php
	session_start();
	include 'conexao.php';
	

	if(isset($_POST['btn-login']))
	{

		$email = $_POST['emailLogin'];
		$senha = md5($_POST['senhaLogin']);
		
		try
		{
			$sql = mysql_query("SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'") or die (mysql_error());
			$row = mysql_num_rows($sql);
			$dados = mysql_fetch_array($sql);

            if($row > 0){
				session_start();

				//Criando as sessões
				$_SESSION['logado'] = TRUE;
				$_SESSION['cod_usuario'] = $dados['cod_usuario'];
				$_SESSION['nome'] = $dados['nome'];
				$_SESSION['sobrenome'] = $dados['sobrenome'];
				$_SESSION['email'] = $dados['email'];
				$_SESSION['senha'] = $dados['senha'];
				$_SESSION['foto'] = $dados['foto'];

				echo "ok"; // log in
                
            } else {
                echo "Email e/ou senha inválidos"; // wrong details         
            }
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}

?>