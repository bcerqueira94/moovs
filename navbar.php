<div class="bgnav">
		<div class="container_12 navbar">
			<div class="grid_2">
				<img src="images/logo_branca.png" class="logomini"/>
			</div>
			<div class="grid_3">
				<div style=" width:300px; float:right; margin-right:30px" align="right">
					<input type="text" class="search" id="searchbox" placeholder="Pesquise algo..." /><br />
					<div id="display">
					</div>
				</div>
			</div>
			<div class="grid_3">
				<ul class="navbar_menu">
					<a href="#"><li>Inicio</li></a>
					<a href="#"><li>Explorar</li></a>
					<a href="#"><li>Novidades</li></a>
				</ul>
			</div>
			<div class="grid_1 notificacao">
				<i class="fa fa-bell" aria-hidden="true"></i>
				<div class="notify"></div>
			</div>
			<div class="grid_3">
				<div class="dropdown">
					<button class="dropbtn">
						<img src="<?php echo $_SESSION['foto']  ?>" class="avatar medium"/>
						<a href="#">
							<?php echo $_SESSION['nome']. ' ' . $_SESSION['sobrenome'] ?>  <i class="fa fa-chevron-down fa-1x" aria-hidden="true"></i>
						</a>
					</button>
					<div class="dropdown-content">
						<a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> Perfil</a>
						<a href="#"><i class="fa fa-film" aria-hidden="true"></i> Filmes</a>
						<a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Configurações</a>
						<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a> 
					</div>
				</div>
			</div>
		</div>
	</div>