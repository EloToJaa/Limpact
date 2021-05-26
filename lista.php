<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<title>Witaj na stronie</title>
		<meta charset="utf-8" />
		<meta name="description" content="Zapraszam na stronę. Będziesz mógł pobrać tu wiele gier mojego autorstwa." />
		<meta name="keywords" content="gry, programy, programowanie, programisci" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="HandheldFriendly" content="true">
		<link rel="icon" href="http://www.limpact.prv.pl/icons/icon.ico">
		<link href="style.css" rel="stylesheet" type="text/css" />
		<link href="css/fontello.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Lato&amp;subset=latin-ext" rel="stylesheet" />
		<script type="text/javascript" src="zegar.js"></script>
	</head>
	<body onload="odliczanie();">
		<div class="wrapper">
			<div class="header">
				<div class="logowanie">
					<?php
						session_start();
						if (!isset($_SESSION['zalogowany'])) {
							echo '<a class="logowanieL" href="http://limpact.cba.pl/logowanie.php">Zaloguj się</a><br /><a class="logowanieL" href="http://limpact.cba.pl/rejestracja.php">Zarejestruj się</a>';
						} else {
							echo "Witaj ".$_SESSION['user'].'!<br \><a class="logowanieL" href="http://limpact.cba.pl/logout.php">Wyloguj się!</a>';
						}
					?>
				</div>
				<div class="logo">
					<span style="color: #c34f4f">L</span>IMPACT<br />
					<div id="timer"></div>
				</div>
				<div style="clear: both"></div>
			</div>
			<div class="nav">
				<ol class="menuOL">
					<li><a href="http://www.limpact.cba.pl/">Strona główna</a></li>
					<li><a href="http://www.limpact.cba.pl/strona2.html">Strona v2</a></li>
					<li><a href="http://www.limpact.cba.pl/zdjecia.php">Zdjęcia</a></li>
					<li><a href="http://www.limpact.cba.pl/tabela.php">Tabela</a></li>
					<li><a href="http://www.limpact.cba.pl/lista.php">Lista</a></li>
					<li><a href="#">Rozwijane</a>
						<ul>
							<li><a href="#">Opcja 1</a></li>
							<li><a href="#">Opcja 2</a></li>
							<li><a href="#">Opcja 3</a></li>
							<li><a href="#">Opcja 4</a></li>
							<li><a href="#">Opcja 5</a></li>
						</ul>
					</li>
				</ol>
			</div>
			<div class="navP">
				<ol class="menuOLP">
					<li><a href="http://www.limpact.cba.pl/">Dom</a></li>
					<li>Więcej
						<ul>
							<li><a href="http://www.limpact.cba.pl/strona2.html">Strona v2</a></li>
							<li><a href="http://www.limpact.cba.pl/zdjecia.php">Zdjęcia</a></li>
							<li><a href="http://www.limpact.cba.pl/tabela.php">Tabela</a></li>
							<li><a href="http://www.limpact.cba.pl/lista.php">Lista</a></li>
						</ul>
					</li>
				</ol>
			</div>
			<div class="content">
				<h1>Lista</h1><br />
				<ol>
					<li>Element 1</li>
					<li>Element 2</li>
					<li>Element 3
						<ul>
							<li>Element 3.1</li>
							<li>Element 3.2</li>
							<li>Element 3.3</li>
						</ul>
					</li>
					<li>Element 4</li>
					<li>Element 5</li>
				</ol>
			</div>
			<div class="socials">
				<div class="socialdivs">
					<div class="fb"><a href="http://www.limpact.cba.pl/fb.html"><i class="icon-facebook"></i></a></div>
					<div class="yt"><a href="http://www.limpact.cba.pl/yt.html"><i class="icon-youtube"></i></a></div>
					<div class="tw"><a href="http://www.limpact.cba.pl/tw.html"><i class="icon-twitter"></i></a></div>
					<div class="gp"><a href="http://www.limpact.cba.pl/gp.html"><i class="icon-google-plus-circle"></i></a></div>
					<div style="clear: both;"></div>
				</div>
			</div>
			<div class="footer">
				Łukasz Budziak  &copy; 2017. Wszystkie prawa zastrzeżone.
			</div>
		</div>
		<script src="jquery-3.2.0.min.js"></script>
		<script>
			$(document).ready(function() {
			var NavY = $('.nav').offset().top;
			var stickyNav = function(){
			var ScrollY = $(window).scrollTop();
			if (ScrollY > NavY) { 
				$('.nav').addClass('sticky');
			} else {
				$('.nav').removeClass('sticky'); 
			}
			};
			stickyNav();
			$(window).scroll(function() {
			stickyNav();
			});
			});
		</script>
		<script>
			$(document).ready(function() {
			var NavY = $('.navP').offset().top;
			var stickyNav = function(){
			var ScrollY = $(window).scrollTop();
			if (ScrollY > NavY) { 
				$('.navP').addClass('sticky');
			} else {
				$('.navP').removeClass('sticky'); 
			}
			};
			stickyNav();
			$(window).scroll(function() {
			stickyNav();
			});
			});
		</script>
	</body>
</html>