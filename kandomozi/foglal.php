<!--PHP-->
<?php 
        require_once "config.php";
        $id = $_GET['id'];
        $sql = "SELECT * FROM filmek WHERE fId = $id"; 
        $stmt = $db->query($sql);
        $row = $stmt->fetch();
        $msg="";

        $sql="select EDatum from eloadasok where fId=$id group by EDatum";
        $stmt = $db->query($sql);
        $StrDatumok="";
        while($sor = $stmt->fetch()){
            extract($sor);
            $StrDatumok.="<option value='$EDatum'>$EDatum</option>";
        }

        $sql="
        select Eido1,Eido2,Eido3,Eido4 from eloadasok where EDatum='{$EDatum}' and FId='{$id}';";
        $stmt = $db->query($sql);
        $Stridok="";
        while($sor = $stmt->fetch()){
            extract($sor);
            $Stridok.="<option value='$Eido1'>$Eido1</option>
            <option value='$Eido2'>$Eido2</option>
            <option value='$Eido3'>$Eido3</option>
            <option value='$Eido4'>$Eido4</option>";
        
    }

        if(isset($_POST['foglal'])){
            extract($_POST);
            $sql="INSERT INTO 
            foglalas(   fogCim,
                        fogDate,
                        fogTime,
                        fogVnev,
                        fogKnev,
                        fogEmail,
                        fogTelefon)  
            VALUES ('".$row['fCim']."',
                    '".$_POST["nap"]."',                
                    '".$_POST["ora"]."',
                    '".$_POST["VezNev"]."',                
                    '".$_POST["KerNev"]."',  
                    '".$_POST["Email"]."',                
                    '".$_POST["tSzam"]."')";               
                            
        $stmt=$db->exec($sql);    
        if($stmt)
        $msg="Sikeres adatbeírás.";
    else $msg="Nem sikerült";
    }
?>
<!--STYLE-->
<style>
body{
    background-image:url(img/mozihatter.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">                                    
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <title><?php echo $row['fCim'];?> foglalás</title>
</head>
<body>
<div class="cim-container">
<div class="row">
    <div class="col-sm-11">
      <h1> <?php echo $row['fCim']; ?> </h1>
    </div>
  
    <div class="col-sm-1" onclick="window.history.go(-1); return false;">
    <i class="fa fa-times" style="font-size:48px;color:darkred"></i>
    </div>
</div> 

        <!--Film Adatok-->
            <div class="table-container">
                <table class="table table-striped table-dark">
                    <tr>
                        <td>Műfaj:</td>
                        <td><?php echo $row['fMufaj']; ?></td>
                    </tr>
                    <tr>
                        <td>Hossz:</td>
                        <td><?php echo $row['fHossz']; ?> p</td>
                    </tr>
                    <tr>
                        <td>Megjelenés dátuma:</td>
                        <td><?php echo $row['fDatum']; ?></td>
                    </tr>
                    <tr>
                        <td>Rendező(k):</td>
                        <td><?php echo $row['fRendezok']; ?></td>
                    </tr>
                    <tr>
                        <td>Szereplő(k):</td>
                        <td><?php echo $row['fSzereplok']; ?></td>
                    </tr>
                </table>
            </div>        
 
            <!--Foglalás-->
            <div class="foglalas-container" style="">
                <form action="" method="POST">
                    <div class="row">
                    <div class="col-sm-12">
                    <select name="nap">
                        <option name="napok" value="0" disabled selected>Válassz napot!</option>
                        <?=$StrDatumok?>
                    </select>
                    <select name="ora">
                        <option value="0" disabled selected>Válaszd ki az időpontot!</option>
                        <?=$Stridok?>
                    </select>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-10">
                    <input placeholder="Vezetéknév" type="text" name="VezNev">
                    <input placeholder="Keresztnév" type="text" name="KerNev">
                    <input placeholder="Email cím" type="text" name="Email">
                    <input placeholder="Telefonszám" type="text" name="tSzam"> 
                    </div>
                    
                    <div class="col-sm-2">
                    <input type="submit" value="Foglalás" name="foglal" class="form-btn btn-danger btn-sm">
                    </div>
                    </div>
                    <h2 class="text-center"><?=$msg?></h2>
                </form>
    </div>
</body>
</html>
