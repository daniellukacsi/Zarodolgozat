<?php
require_once "config.php";
$sql="select * from filmek;";
$adatok="";
$stmt = $db->query($sql);
while($sor=$stmt->fetch()){
    extract($sor);
    $adatok.="
    <div class='movie-box'>
        <img src='img/{$fImg}' alt=''>
        <div class='movie-info '>
            <h3>{$fCim}</h3>
            <a href=foglal.php?id={$fId}>Foglalás</a>
        </div>
    </div>";}
?>

<header id="fejlec" style="background-image:url(img/mozihatter.jpg)">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
            <div class="col-12 text-center text-light"  style="-webkit-text-stroke: 1px black;">
                <h1>Kandó Mozi</h1>
                <h2 >Üdvözöllek a weboldalon, ahol suli után vagy akár lyukasórák között megnézhetsz egy filmet a kinálatunkból a barátaiddal!!!</h2>
                <h2>Foglaláshoz görgess lejjebb!!</h2>
            </div>
            </div>
        </div>
    </header>

     <!--FILMEK-->
<div id="home-1" class="movie-show-container">
    <h3>Foglalj most!</h3>
    <div class="movies-container">
    <?=$adatok?>
    </div>
</div>
