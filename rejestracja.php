<!DOCTYPE HTML>
<?php
	session_start();
	if (isset($_POST['email'])) {
		$wszystko_OK=true;
		$nick = $_POST['nick'];
		if ((strlen($nick)<3) || (strlen($nick)>20)) {
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
		}
		if (ctype_alnum($nick)==false) {
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email)) {
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20)) {
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		if ($haslo1!=$haslo2) {
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	
		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		if (!isset($_POST['regulamin'])) {
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}
		$sekret = "6LeXOB4UAAAAAO6inDmlyUWbNG9ml8dDzBE9R3dU";
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		$odpowiedz = json_decode($sprawdz);
		if ($odpowiedz->success==false) {
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
		}
		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		try {
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0) {
				throw new Exception(mysqli_connect_errno());
			} else {
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				if (!$rezultat) throw new Exception($polaczenie->error);
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0) {
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
				if (!$rezultat) throw new Exception($polaczenie->error);
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0) {
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
				}
				if ($wszystko_OK==true) {
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email', 100, 100, 100, 14)")) {
						$_SESSION['udanarejestracja']=true;
						header('Location: witamy.php');
					} else {
						throw new Exception($polaczenie->error);
					}
				}
				$polaczenie->close();
			}
		}
		catch(Exception $e) {
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
	}
?>
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
		<script src='https://www.google.com/recaptcha/api.js'></script>
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
				<h1>Rejestracja</h1><br />
				<form method="post">
		Login: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_nick'])) {
				echo $_SESSION['fr_nick'];
				unset($_SESSION['fr_nick']);
			}
		?>" name="nick" /><br /><br />
		<?php
			if (isset($_SESSION['e_nick'])) {
				echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
				unset($_SESSION['e_nick']);
			}
		?>
		E-mail: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_email'])) {
				echo $_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}
		?>" name="email" /><br /><br />
		<?php
			if (isset($_SESSION['e_email'])) {
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
		?>
		Twoje hasło: <br /> <input type="password"  value="<?php
			if (isset($_SESSION['fr_haslo1'])) {
				echo $_SESSION['fr_haslo1'];
				unset($_SESSION['fr_haslo1']);
			}
		?>" name="haslo1" /><br /><br />
		<?php
			if (isset($_SESSION['e_haslo'])) {
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
		?>		
		Powtórz hasło: <br /> <input type="password" value="<?php
			if (isset($_SESSION['fr_haslo2'])) {
				echo $_SESSION['fr_haslo2'];
				unset($_SESSION['fr_haslo2']);
			}
		?>" name="haslo2" /><br /><br />
		<label>
			<input type="checkbox" name="regulamin" <?php
			if (isset($_SESSION['fr_regulamin'])) {
				echo "checked";
				unset($_SESSION['fr_regulamin']);
			}
			?>/> Akceptuję regulamin
		</label> <br /><br />
		<?php
			if (isset($_SESSION['e_regulamin'])) {
				echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}
		?>
		<div class="g-recaptcha" data-sitekey="6LeXOB4UAAAAABFAIt-GkzbyftL4qp6Lj1ATyJk4"></div>
		<?php
			if (isset($_SESSION['e_bot'])) {
				echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
				unset($_SESSION['e_bot']);
			}
		?>	
		<br />
		<input type="submit" value="Zarejestruj się" />
				</form>
				<br />Posiadasz już konto? <a class="logowanieL" href="http://www.limpact.cba.pl/logowanie.php">Zaloguj się!</a>
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