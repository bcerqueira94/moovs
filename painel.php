<?php
	session_start();
	include_once 'conexao.php';

	if(isset($_SESSION['logado'])=='0')
	{
		header("Location: index.php");
	}

	
?>


<html>
	<head>
		<title>Moovs</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="shortcut icon" href="../images/icon.png">
		
		<!-- CSS -->
		<link rel="stylesheet" href="css/960.css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/font-awesome.css" type="text/css">

		<!-- JS -->
		<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.watermarkinput.js"></script>
		
		<link href="css/jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
        <script src="js/jcrop/jquery.Jcrop.min.js"></script>
        <script src="js/jcrop/script.js"></script>

		
		<script type="text/javascript">
			$(document).ready(function(){
				$(".search").keyup(function() {
					var searchbox = $(this).val();
					var dataString = 'searchword='+ searchbox;
					if(searchbox==''){
					} else {
						$.ajax({
							type: "POST",
							url: "search.php",
							data: dataString,
							cache: false,
							success: function(html)
							{
								$("#display").html(html).show();
							}
						});
					}return false;    
				});
			});
			jQuery(function($){
			   $("#searchbox").Watermark("Pesquise algo...");
			});
		</script>		
	</head>
	<body>

<div class="geral">

	<?php include 'navbar.php' ?>

	<div id="aleatorio"></div>
	<img src="images/effect.png" class="effect"/>

	
	<div class="container_12 perfil">
		<div class="grid_4 counter">
			FOLLOWERS
			<div class="number">
				159
			</div>
		</div>
		<div class="grid_4">
			 <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php" onsubmit="return checkForm()">
					 <!-- hidden crop params -->
                    <input type="hidden" id="x1" name="x1" />
                    <input type="hidden" id="y1" name="y1" />
                    <input type="hidden" id="x2" name="x2" />
                    <input type="hidden" id="y2" name="y2" />
				
				<div>	
					<input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" />
					<a href="javascript:void(0)" id="upload_link" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">
						<i class="fa fa-camera" aria-hidden="true"></i>
					</a> 
					<img src="<?php echo $_SESSION['foto']?>" class="avatar big"/>								
				</div>
				
				<div id="light" class="white_content">					
					<div class="error"></div>

                    <div class="step2">
                        <h2>Step2: Please select a crop region</h2>
                        <img id="preview" />

                        <div class="info">
                            <label>File size</label> <input type="text" id="filesize" name="filesize" />
                            <label>Type</label> <input type="text" id="filetype" name="filetype" />
                            <label>Image dimension</label> <input type="text" id="filedim" name="filedim" />
                            <label>W</label> <input type="text" id="w" name="w" />
                            <label>H</label> <input type="text" id="h" name="h" />
                        </div>

                        <input type="submit" value="Upload" />
                    </div>
			</form>

				<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">
					Close
				</a>
				</div>
				<div id="fade" class="black_overlay"></div>
		</div>
		<div class="grid_4 counter">
			FOLLOWING
			<div class="number">
				30
			</div>
		</div>
	</div>	
	<div class="container_12">
		<div class="grid_12 nomeusuario">
			<?php echo $_SESSION['nome'] . ' ' . $_SESSION['sobrenome']  ?>
		</div>
		<div class="grid_8 prefix_2 suffix_2 biousuario">
			Pellentesque odio lacus, porttitor sit amet pellentesque at, ultricies sed orci. Vestibulum sit amet arcu ut purus aliquam eleifend
			sit amet id neque. Donec eu metus tellus. Nullam tristique quis elit at rhoncus. Nam sed maximus turpis. Sed condimentum mi.
		</div>
	</div>


	<!-- REMOVER DEPOIS -->
	<div class="container_12" id="feed">
			<div class="grid_3" style="float:left">
				<div class="menu_lateral">					
					<ul>
						<a href="#activity_box"><li>Atividades</li></a>
						<a href="#mymovies"><li>Meus Filmes</li></a>
						<a href="#review"><li>Reviews</li></a>
					</ul>
				</div>
			</div>
			<div class="grid_9" style="float:right">		
				<div id="activity_box">
					<h2>Activity</h2>
					<ul class="activity">
						<li>
							<table>
								<tr>
									<td>
										<img src="<?php echo $_SESSION['foto']?>" class="activity_user">
									</td>
									<td>
										<span><?php echo $_SESSION['nome']. ' ' . $_SESSION['sobrenome'] ?></span><br/><br/>
										Adicionou <a href="#">DOUTOR ESTRANHO</a> a lista de interesse.<br/>
									</td>
								</tr>
							</table>
							<table class="status_table">
								<tr class="status_line">
									<td colspan="2" class="status_box">
										<a><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 2 Likes</a>
										<a><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 2 Deslikes</a>
										<a><i class="fa fa-comment-o" aria-hidden="true"></i> 1 Comentário</a>
									</td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td>
										<img src="<?php echo $_SESSION['foto']?>" class="activity_user">
									</td>
									<td>
										<span><?php echo $_SESSION['nome']. ' ' . $_SESSION['sobrenome'] ?></span><br/><br/>
										Escreveu um review de <a href="#">DEAD POOL</a>.<br/>
									</td>
								</tr>
							</table>	
							<div class="note">
											<i class="fa fa-star" aria-hidden="true"></i> 4/10
							</div>
							<table class="status_table">
								<tr class="status_line">
									<td colspan="2" class="status_box">
										<a><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 7 Likes</a>
										<a><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 3 Deslikes</a>
										<a><i class="fa fa-comment-o" aria-hidden="true"></i> 10 Comentário</a>
									</td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td>
										<img src="images/users/user1.jpg" class="activity_user recommend">
										<img src="<?php echo $_SESSION['foto']?>" class="activity_user">
									</td>
									<td>
										<span><?php echo $_SESSION['nome']. ' ' . $_SESSION['sobrenome'] ?></span><br/><br/>
										Recomendou <a href="#">BATMAN VS SUPERMAN: DAWN OF JUSTICE</a> para <a href="#">Edson Gabriel</a><br/>
									</td>
								</tr>
							</table>
							<table class="status_table">
								<tr class="status_line">
									<td colspan="2" class="status_box">
										<a><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 13 Likes</a>
										<a><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 2 Deslikes</a>
										<a><i class="fa fa-comment-o" aria-hidden="true"></i> 0 Comentário</a>
									</td>
								</tr>
							</table>
							
						</li>
						<li>
							<table>
								<tr>
									<td>
										<img src="<?php echo $_SESSION['foto']?>" class="activity_user">
									</td>
									<td>
										<span><?php echo $_SESSION['nome']. ' ' . $_SESSION['sobrenome'] ?></span><br/><br/>
										Adicionou <a href="#">CAPTAIN AMERICA: CIVIL WAR</a> a lista de interesse.<br/>
									</td>
								</tr>
							</table>
							<table class="status_table">
								<tr class="status_line">
									<td colspan="2" class="status_box">
										<a><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 33 Likes</a>
										<a><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 1 Deslike</a>
										<a><i class="fa fa-comment-o" aria-hidden="true"></i> 0 Comentário</a>
									</td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td>
										<img src="<?php echo $_SESSION['foto']?>" class="activity_user">
									</td>
									<td>
										<span><?php echo $_SESSION['nome']. ' ' . $_SESSION['sobrenome'] ?></span><br/><br/>
										Escreveu um review de <a href="#">X-MEN: APOCALIPSE</a>.<br/>
										
									</td>
								</tr>
							</table>
							<div class="note">
											<i class="fa fa-star" aria-hidden="true"></i> 5/10
							</div>
							<table class="status_table">
								<tr class="status_line">
									<td colspan="2" class="status_box">
										<a><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 23 Likes</a>
										<a><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 5 Deslikes</a>
										<a><i class="fa fa-comment-o" aria-hidden="true"></i> 3 Comentário</a>
									</td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td>
										<img src="images/users/user2.jpg" class="activity_user recommend">
										<img src="<?php echo $_SESSION['foto']?>" class="activity_user">
									</td>
									<td>
										<span><?php echo $_SESSION['nome']. ' ' . $_SESSION['sobrenome'] ?></span><br/><br/>
										Recomendou <a href="#">AVENGERS: AGE OF ULTRON</a> para <a href="#">Junior Leal</a>.<br/>
									</td>
								</tr>
							</table>
							<table class="status_table">
								<tr class="status_line">
									<td colspan="2" class="status_box">
										<a><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 2 Like</a>
										<a><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 6 Deslikes</a>
										<a><i class="fa fa-comment-o" aria-hidden="true"></i> 10 Comentários</a>
									</td>
								</tr>
							</table>
						</li>
						<li>
							<table>
								<tr>
									<td>
										<img src="images/users/user3.jpg" class="activity_user recommend">
										<img src="<?php echo $_SESSION['foto']?>" class="activity_user">
									</td>
									<td>
										<span><?php echo $_SESSION['nome']. ' ' . $_SESSION['sobrenome'] ?></span><br/><br/>
										Recomendou <a href="#">SUICIDE SQUAD</a> para <a href="#">Giulia Ribeiro</a>.<br/>
									</td>
								</tr>
							</table>
							<table class="status_table">
								<tr class="status_line">
									<td colspan="2" class="status_box">
										<a><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 1 Like</a>
										<a><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 16 Deslikes</a>
										<a><i class="fa fa-comment-o" aria-hidden="true"></i> 4 Comentários</a>
									</td>
								</tr>
							</table>
						</li>
						<button type="button" class="bt style2">Ver mais</button>	
					</ul>
					
				</div>
			</div>
			<div class="grid_9 prefix_3" id="mymovies">
				<h2>Meus Filmes</h2>
				<div>
				
					<ul class="genres">
						<a href="#"><li class="press">Ação</li></a>
						<a href="#"><li class="press">Animação</li></a>
						<a href="#"><li>Aventura</li></a>
						<a href="#"><li>Comédia</li></a>
						<a href="#"><li class="press">Corrida</li></a>
						<a href="#"><li class="press">Documentário</li></a>
						<a href="#"><li class="press">Drama</li></a>
						<a href="#"><li>Faroeste</li></a>
						<a href="#"><li>Guerra</li></a>
						<a href="#"><li>Infantil</li></a>
						<a href="#"><li>Terror</li></a>
					</ul>
				
					<table>
						<tr>
							<td>
								<img src="images/movies/guardians_of_the_galaxy.jpg"/>
							</td>
							<td>
								<img src="images/movies/alien.jpg"/>
							</td>
							<td>
								<img src="images/movies/power_rangers.jpg"/>
							</td>
							<td>
								<img src="images/movies/x_men.jpg"/>
							</td>
							<td>
								<img src="images/movies/spider_man.jpg"/>
							</td>
						</tr>
						<tr>
							<td>
								<img src="images/movies/suicide_squad.jpg"/>
							</td>
							<td>
								<img src="images/movies/cars.jpg"/>
							</td>
							<td>
								<img src="images/movies/chamado.jpg"/>
							</td>
							<td>
								<img src="images/movies/guardians.jpg"/>
							</td>
							<td>
								<img src="images/movies/dunkirk.jpg"/>
							</td>
						</tr>
					</table>
					<button type="button" class="bt bt_profile style2">Página Anterior</button>
					<button type="button" class="bt bt_profile " style="float:right; margin-right:20px;">Próxima Página</button>
				</div>
			</div>
			
			<div class="grid_9 prefix_3" id="review">		
				<div id="review_box">
					<h2>Reviews</h2>
					<ul class="reviews">
					<li>
						<table>
							<tr>
								<td colspan="3">
									<h2><a href="">Guardians of The Galaxy Vol. 2</a></h2>
								</td>
							</tr>
							<tr>
								<td class="picture">
									<img src="<?php echo $_SESSION['foto']?>" class="activity_user">
								</td>
								<td class="user">
									<span><?php echo $_SESSION['nome']. ' ' . $_SESSION['sobrenome'] ?></span><br/>
								</td>
								<td class="note">
									<i class="fa fa-star" aria-hidden="true"></i> 5/10<br/>
									<span class="date">05/02/2017</span>
								</td>
							</tr>
							<tr>
								<td colspan="3" class="comment">
									
									<span>Curabitur condimentum</span>
								
									<p>Curabitur condimentum massa at massa vulputate iaculis. Mauris nec turpis quam. Nulla congue posuere scelerisque. Donec semper nunc orci, ut pretium ipsum aliquam id. Curabitur vitae risus vel orci egestas egestas. Vivamus malesuada tristique lorem, et consequat velit aliquet eget. Proin ornare euismod volutpat.</p>
								</td>
							</tr>
						</table>
						<table class="status_table">
								<tr class="status_line">
									<td colspan="2" class="status_box">
										<a><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 63 Likes</a>
										<a><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 1 Deslike</a>
										<a><i class="fa fa-comment-o" aria-hidden="true"></i> 10 Comentários</a>
									</td>
								</tr>
							</table>
					</li>
					<li>
						<table>
							<tr>
								<td colspan="3">
									<h2><a href="">Captain America: Civil War</a></h2>
								</td>
							</tr>
							<tr>
								<td class="picture">
									<img src="<?php echo $_SESSION['foto']?>" class="activity_user">
								</td>
								<td class="user">
									<span><?php echo $_SESSION['nome']. ' ' . $_SESSION['sobrenome'] ?></span><br/>
								</td>
								<td class="note">
									<i class="fa fa-star" aria-hidden="true"></i> 2/10<br/>
									<span class="date">15/04/2016</span>
								</td>
							</tr>
							<tr>
								<td colspan="3" class="comment">
									
									<span>Aenean non semper purus</span>
								
									<p>Ivamus eu tempus libero. Phasellus quam dolor, dapibus in sagittis a, scelerisque vel justo. Sed mollis aliquet nisi vel viverra. Phasellus iaculis libero a facilisis iaculis. Aenean non semper purus. Ut ornare lacus id ullamcorper tristique. Aliquam eget est tristique, ornare ante imperdiet, tristique mi. Duis pellentesque pharetra sapien.</p>
								</td>
							</tr>
						</table>
						<table class="status_table">
								<tr class="status_line">
									<td colspan="2" class="status_box">
										<a><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 3 Likes</a>
										<a><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 6 Deslikes</a>
										<a><i class="fa fa-comment-o" aria-hidden="true"></i> 0 Comentários</a>
									</td>
								</tr>
							</table>
					</li>
					<li>
						<table>
							<tr>
								<td colspan="3">
									<h2><a href="">SUICIDE SQUAD</a></h2>
								</td>
							</tr>
							<tr>
								<td class="picture">
									<img src="<?php echo $_SESSION['foto']?>" class="activity_user">
								</td>
								<td class="user">
									<span><?php echo $_SESSION['nome']. ' ' . $_SESSION['sobrenome'] ?></span><br/>
								</td>
								<td class="note">
									<i class="fa fa-star" aria-hidden="true"></i> 7/10<br/>
									<span class="date">11/02/2016</span>
								</td>
							</tr>
							<tr>
								<td colspan="3" class="comment">
									
									<span>Morbi in posuere ligula</span>
								
									<p>Cras rutrum, mauris sed ornare efficitur, nunc tortor tincidunt tellus, vitae dignissim magna velit vitae ligula. Donec mattis vestibulum lectus, nec facilisis arcu. Morbi in posuere ligula.</p>
								</td>
							</tr>
						</table>
						<table class="status_table">
								<tr class="status_line">
									<td colspan="2" class="status_box">
										<a><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 5 Likes</a>
										<a><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 22 Deslikes</a>
										<a><i class="fa fa-comment-o" aria-hidden="true"></i> 9 Comentários</a>
									</td>
								</tr>
							</table>
					</li>
					<button type="button" class="bt style2">Ver mais</button>
				</ul>
					
					
					
				</div>
			</div>
		</div>
</DIV>
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
	
		<script>
		$(function (){ 
			$("#upload_link").on('click', function(e){ 
				e.preventDefault(); 
				$("#image_file:hidden").trigger('click'); 
			});  
		}); 
		</script>
		
		<script>
		var menu = document.querySelector('.menu_lateral');
		var menuPosition = menu.getBoundingClientRect();
		var placeholder = document.createElement('div');
		placeholder.style.width = menuPosition.width + 'px';
		placeholder.style.height = menuPosition.height + 'px';
		var isAdded = false;

		window.addEventListener('scroll', function() {
			if (window.pageYOffset >= menuPosition.top && !isAdded) {
				menu.classList.add('sticky');
				menu.parentNode.insertBefore(placeholder, menu);
				isAdded = true;
			} else if (window.pageYOffset < menuPosition.top && isAdded) {
				menu.classList.remove('sticky');
				menu.parentNode.removeChild(placeholder);
				isAdded = false;
			}
		});
		</script>
		<script>
				$('a[href*="#"]:not([href="#"])').click(function() {
		  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
			  $('html, body').animate({
				scrollTop: target.offset().top
			  }, 1000);
			  return false;
			}
		  }
		});
		</script>
	
	</body>
</head>