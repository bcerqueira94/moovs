<?php
			error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
			$host = "moovs.com.br";
			$user = "moovs_adm";
			$pass = "Crkgpgvt25";
			$banco = "moovs_db";
			$conexao = mysql_connect($host, $user, $pass) or die (mysql_error);
			mysql_select_db($banco) or die(mysql_error);	
?>