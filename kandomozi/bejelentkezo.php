<?php
require_once "vizsgalo.php";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    

    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>  
    <title>Bejelentkezés</title>
</head>
<body>
    <?php
	//Felveszünk egy változót, hogy tudjuk sikerült bejelentkeznünk vagy nem
	$is_logged_in = FALSE;
	
    //Megpróbálunk bejelentkezni
    try_to_login();

    //Ellenőrizzük, hogy be vagyunk-e jelentkezve vagy nem, ha nem megjelenítjük a formot
    if( $is_logged_in == FALSE )
    {
    ?>
    <div class="container border bg-light">
    <div class="row justify-content-center">
        <div class="col-2">
        <form action="" method="POST">
            <div class="form-group">
                <label>Felhasználónév</label>
                <input class="form-control" type="text" 
                    name="username" value=""/>
            </div>

            <div class="form-group">
                <label>Jelszó</label>
                <input class="form-control" type="password" 
                name="password" value=""/>
            </div>

            <div class="form-group">
                <input type="submit" 
                name="submit" class="btn btn-danger" value="Bejelentkezés" />
            </div>
        </form>
    </div>
    </div>
    <?php
    }
    else
    {
    ?>
    <div class="row justify-content-center">
        <h3><a style="color:red;" href="admin.php">Kattints ide!!</a></h3>
    </div>
    <?php
    }
    ?>
</body>
</html>