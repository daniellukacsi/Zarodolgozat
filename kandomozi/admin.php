<?php
	  require_once 'config.php';	

    $foglalasok="";    
    $visszajelzes="";
    $eloadasok="";
    $filmek="";
    $filmeklista="";
    $msg1="";
    $msg2="";

    //Foglalas sql//
    $adat=$db->query("select * from foglalas;");  
    while($sor=$adat->fetch()){
    extract($sor);
    $foglalasok.="<tr><td><a class='btn btn-danger' href='deleteFoglalas.php?id={$fogId}'>Törlés</a></td>
    <td>{$fogCim}</td><td>{$fogDate}</td><td>{$fogTime}</td><td>{$fogVnev}</td><td>{$fogKnev}</td><td>{$fogEmail}</td><td>{$fogTelefon}</td></tr>";
    }


    //visszajelzes sql//
    $adat2=$db->query("select * from visszajelzes;");
    while($sor=$adat2->fetch()){
    extract($sor);
    $visszajelzes.="<tr><td><a class='btn btn-danger' href='deleteUzenet.php?id={$uId}'>Törlés</a></td>
    <td>{$Vnev}</td><td>{$Knev}</td><td>{$Email}</td>
    <td>{$Szov}</td></tr>";
    }

    //filmek sql//
    $adat3=$db->query("select * from filmek;");
    while($sor=$adat3->fetch()){
    extract($sor);
    $filmek.="<tr><td><a class='btn btn-danger' href='deleteFilm.php?id={$fId}'>Törlés</a></td>
    <td>{$fCim}</td><td>{$fMufaj}</td><td>{$fHossz} p</td><td>{$fDatum}</td></tr>";
    }

    //film hozzaadas sql//
    if(isset($_POST['filmfelvetel'])){
        extract($_POST);
        $sql="insert into filmek values (null,'{$fCim}','{$fImg}','{$fMufaj}','{$fHossz}','{$fDatum}','{$fRendezok}','{$fSzereplok}','{$fTartalom}','{$fLink}')";
        $stmt=$db->exec($sql);

    if($stmt)
        $msg1="Sikeres adatbeírás.";
    else $msg1="Nem sikerült";
     }
    
    //Eloadas felvetele//
    $sql="select * from eloadasok inner join filmek on filmek.fId=eloadasok.FId group by fCim;";
      $stmt = $db->query($sql);  
      $filmeklista="";
      while($sor = $stmt->fetch()){
          extract($sor);
          $filmeklista.="<option value='$fId'>$fCim</option>";

      }
      if(isset($_POST['eloadasfelvetel'])){
          extract($_POST);
          $sql="insert into eloadasok values (null,'{$FId}','{$EDatum}','{$Eido1}','{$Eido2}','{$Eido3}','{$Eido4}')";
          $stmt=$db->exec($sql);

      if($stmt)
          $msg2="Sikeres adatbeírás.";
      else $msg2="Nem sikerült";
      }
    //Eloadasok//
    $adat4=$db->query("select filmek.fCim,eloadasok.EDatum,eloadasok.Eido1,eloadasok.Eido2,eloadasok.Eido3,eloadasok.Eido4
    from eloadasok inner join filmek
    on filmek.fId=eloadasok.FId order by EDatum,fCim;");
    while($sor=$adat4->fetch()){
    extract($sor);
    $eloadasok.="<tr><td><a class='btn btn-danger' href='deleteEloadas.php?id={$EId}'>Törlés</a></td>
    <td>{$EDatum}</td><td>{$fCim}</td><td>{$Eido1}</td><td>{$Eido2}</td><td>{$Eido3}</td><td>{$Eido4}</td></tr>";
    }
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />                                       
    <script src="bootstrap/jquery.min.js"></script>
     <script src="bootstrap/bootstrap.min.js"></script>
        <title>Admin</title>
	</head>
<body>
<style>
.scrollable{
  height:400px;
  overflow:scroll;
}
a{
  color:white;
}
a:hover {
 color:red;
}
</style>
<nav id="navbar" class="navbar navbar-expand-lg fixed-top" style="background-color:darkred">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">            
            <li><a class="nav-link" href="admin.php#foglalasok">Foglalások</a></li>
            <li><a class="nav-link" href="admin.php#uzenetek">Üzenetek</a></li>
            <li><a class="nav-link" href="admin.php#filmek">Filmek</a></li>
            <li><a class="nav-link" href="admin.php#filmfel">Film felvétel</a></li>
            <li><a class="nav-link" href="admin.php#eloadasok">Előadások</a></li>
            <li><a class="nav-link" href="admin.php#eloadasfel">Előadás felvétel</a></li>
            </ul>
            </div>
        </div>
    </nav>
<div class="container border p-12">
  <h2 id="foglalasok" class="text-center">Foglalások</h2>
  <form action="" method="POST">
	  <div class="col-md-12">
		 <div class="table-responsive scrollable">
		   <table class="table table-hover table-fixed-border">
			   <thead>
         <tr>
          <th></th>
          <th>Cím</th> 
          <th>Nap</th>
          <th>Óra</th>
          <th>Vezetéknév</th>
          <th>Keresztnév</th>
          <th>Email</th>
          <th>Telefon</th>
         </tr>
         </thead>
			   <tbody><?=$foglalasok?></tbody>
		  </table>
		</div>
	  </div>
    </form>
</div>
<br>
<div class="container border p-12">
  <h2 id="uzenetek" class="text-center">Üzenetek</h2>
	  <div class="col-md-12">
		 <div class="table-responsive scrollable">
		   <table class="table table-hover table-fixed-border">
			   <thead>
         <tr>
         <th></th>
         <th>Vezetéknév</th><th>Keresztnév</th><th>Email-cím</th><th>Üzenet</th>
         </tr>
         </thead>
			   <tbody><?=$visszajelzes?></tbody>
		  </table>
		</div>
	  </div>
</div>
<br>
<div class="container border p-12">
  <h2 id="filmek" class="text-center">Filmek</h2>
	  <div class="col-md-12">
		 <div class="table-responsive scrollable">
		   <table class="table table-hover table-fixed-border">
			   <thead>
         <tr>
         <th></th>
         <th>Film cím</th><th>Műfaj</th><th>Hossz</th><th>Megjelenés dátuma</th>
         </tr>
         </thead>
			   <tbody><?=$filmek?></tbody>
		  </table>
		</div>
	  </div>
</div>
<br>
<div class="container border p-12">
  <h2 id="filmfel" class="text-center">Film felvétel</h2>
	  <div class="col-md-12">
      <form action="" method="POST">
        <div class="text-center">
        <input placeholder="Cím" type="text" name="fCim" class="form-label">
        <input placeholder="Műfaj" type="text" name="fMufaj" class="form-label">
        <input placeholder="Hossz(p)" type="number" name="fHossz" class="form-label">
        <input placeholder="Megjelenés Dátuma" type="date" name="fDatum" class="form-label">
        </div>
        
        <div class="text-center">
        <input placeholder="Rendező" type="text" name="fRendezok" class="form-label">
        <input placeholder="Színészek" type="text" name="fSzereplok" class="form-label">
        <input placeholder="Taratalom" type="text" name="fTartalom" class="form-label">
        <input placeholder="Link" type="text" name="fLink" class="form-label">
        <input type="file" name="fImg">
        </div>
        
        <div class="text-center">
        <input type="submit" value="Film felvétele" name="filmfelvetel" class="btn btn-secondary">
        <?=$msg1?>
        </div>  
  </form>
</div>
</div>
<br>
  <div class="container border p-12">
  <h2 id="eloadasok" class="text-center">Előadások</h2>
	  <div class="col-md-12">
		 <div class="table-responsive scrollable">
		   <table class="table table-hover table-fixed-border">
			   <thead>
         <tr>
         <th></th>
         <th>Dátum</th><th>Film cím</th><th class="text-center" colspan="4">Idők</th>
         </tr>
         </thead>
			   <tbody><?=$eloadasok?></tbody>
		  </table>
		</div>
	  </div>
</div>    
<br>
    <div class="container border p-12">
    <h2 id="eloadasfel" class="text-center">Előadás felvétel</h2>
	    <div class="col-md-12 text-center">
      <form action="" method="POST">
        <select name="FId">
          <option value="0" disabled selected>Válassz egy filmet!</option>
            <?=$filmeklista?>
        </select>
        <input placeholder="Dátum" type="date" name="EDatum" class="form-label">
        <input placeholder="Idő" type="time" name="Eido1" class="form-label">
        <input placeholder="Idő" type="time" name="Eido2" class="form-label">
        <input placeholder="Idő" type="time" name="Eido3" class="form-label">
        <input placeholder="Idő" type="time" name="Eido4" class="form-label">
        <input type="submit" value="Előadás felvétele" name="eloadasfelvetel" class="btn btn-secondary">
        <?=$msg2?>
      </form>
		</div>
	</div>
</div>
<br>
</body>
</html>