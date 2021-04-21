<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"><!--ikonok-->                                   
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <title>Kandó mozi</title>
</head>

<script>
window.addEventListener('load',Menu)

function Menu(){
    let array=document.links;
    let userUrl=document.URL;
    for (let index = 0; index < array.length; index++) {
        if(array[index].href == userUrl){
            document.links[index].style.color = "red";
        }    
    }
}
</script>

<body style="background-color:black;">
    <!--NAVIGÁCIÓ-->
    <nav id="navbar" class="navbar navbar-expand-lg" style="background-color:darkred;">
    <div id="navbar-admin" class="navbar-brand">
    <a style="color:white;" href="bejelentkezo.php">Kandó mozi</a>
</div>
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">            
            <li><a style="color:white;" class="nav-link" href="index.php">Főoldal</a></li>
            <li><a style="color:white;" class="nav-link" href="index.php?p=filmajanlo.php">Filmek</a></li>
            <li><a style="color:white;" class="nav-link" href="index.php?p=musor.php">Műsor</a></li>
            <li><a style="color:white;" class="nav-link" href="index.php?p=kapcsolat.php">Kapcsolat</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <!--Oldal alap-->

		<?php
		if(isset($_GET["p"])){
			include $_GET["p"];
		}
		else include("fooldal.php");
		?>

	<footer class="page-footer bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12">
					<h6 class="font-weight-bold text-uppercase">Iskolánkról</h6>
					<p><a style="color:darkred;" href="http://www.kando-kkt.sulinet.hu/" target="_BLANK">Kandó Kálmán Technikum</a></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h6 class="font-weight-bold text-uppercase">Kapcsolat</h6>
					<p>6000 Kecskemét Bethlen krt.<br>
						e-mail: <a style="color:darkred;" href="kandomozi@kkando.hu" target="_BLANK">zarodolgozat@kkando.com</a><br>
						telefon: +36 96 123 4567<br>
						</p>
				</div>
			</div>
		</div>
		<div class="text-center">© 2021 Záródolgozat</div>
	</footer>
    
</body>
</html>