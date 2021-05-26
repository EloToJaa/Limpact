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
				<h1>Lorem ipsum</h1><br />
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et efficitur ipsum, non dignissim magna. Curabitur sed tempor est, sit amet fringilla diam. In accumsan consequat nunc ac cursus. Vestibulum non purus in est dictum placerat. Mauris pellentesque risus ut est efficitur laoreet in vitae ante. Fusce nec venenatis justo. In neque libero, lobortis nec mattis pulvinar, pellentesque ac sem. Quisque dignissim, metus a consectetur molestie, est nunc volutpat lacus, vel vehicula metus dolor a sapien. Nam at rhoncus nisi, id congue felis. Maecenas egestas augue in dolor bibendum consectetur. Morbi nec erat non leo porttitor sodales. Nulla efficitur erat et justo malesuada, quis blandit diam posuere.
				<br /><br />
				Etiam vitae pulvinar turpis, eu ultricies lacus. Pellentesque ac tellus a erat laoreet luctus. Phasellus efficitur volutpat finibus. In suscipit, mi eget rhoncus commodo, mauris nibh vehicula tellus, ac finibus lorem nisl ac sem. Nullam sapien odio, blandit ut nisl non, tristique congue dolor. Phasellus consectetur ante eu imperdiet interdum. Quisque maximus finibus nulla, sed sodales nulla laoreet at. Morbi semper, nibh eget cursus fringilla, lacus leo interdum magna, at vehicula lorem nibh at enim. Phasellus fermentum mauris turpis, vel ultrices odio bibendum in.
				<br /><br />
				Vivamus vel accumsan sem. Nam sodales arcu eu ultricies ullamcorper. Aliquam et volutpat augue. Maecenas sed lacus commodo, rhoncus elit in, aliquet lectus. Pellentesque tincidunt, mauris rutrum facilisis sodales, tortor nibh maximus orci, et semper dui ipsum eu mi. Phasellus tempor sapien quis ipsum tincidunt, in molestie ipsum iaculis. Quisque dignissim a purus id mattis. Morbi porttitor auctor tellus in tempor. Aenean hendrerit ligula vel odio egestas tempor. Mauris sit amet sapien mattis, interdum libero id, dapibus est. Donec luctus, ante eget accumsan porta, libero ante pretium nisi, vitae tincidunt nisi eros in enim. Nullam vulputate dolor sit amet nulla bibendum, et scelerisque erat mollis. Mauris venenatis sem vitae aliquet laoreet. Cras at ante tristique, sagittis mauris quis, tincidunt augue.
				<br /><br />
				Cras accumsan dignissim nisl ac ornare. Morbi eu risus pharetra orci convallis faucibus. Aenean lacus urna, maximus in leo at, efficitur efficitur leo. Sed lobortis nisi vel neque interdum mollis. Duis placerat ante aliquam urna finibus, egestas dignissim est vestibulum. In convallis luctus dolor id malesuada. Duis venenatis, nisi dictum rutrum tincidunt, ex sapien vestibulum magna, eu fermentum tortor erat tincidunt sapien. Donec hendrerit, quam vel eleifend mattis, lorem justo bibendum libero, in posuere dui quam sit amet massa. Morbi sollicitudin justo viverra, rutrum arcu vel, dictum leo. Nunc lacinia diam vitae nibh vehicula varius. Vivamus sagittis tristique mi in eleifend. In vitae malesuada nisl. Phasellus ultricies vehicula risus in accumsan.
				<br /><br />
				Nullam suscipit neque id pharetra semper. Integer placerat nunc eu arcu venenatis mollis. Vivamus interdum facilisis luctus. Curabitur placerat viverra diam, non placerat sem feugiat ut. Praesent bibendum massa nec magna interdum, sed tincidunt magna vulputate. Donec dignissim in tortor vel pharetra. Nullam rutrum hendrerit urna, ac sagittis risus aliquet a. Sed nisl nisi, tristique eu suscipit vitae, tempus non ante. Vestibulum sit amet nisi nec quam euismod luctus sed et quam. Curabitur vestibulum bibendum ipsum sed porta. Nam quis convallis diam.
				<br /><br />
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