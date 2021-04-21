<?php
require_once "config.php";

$sql="select EDatum from eloadasok group by EDatum;";
$stmt=$db->query($sql);
$d_eredmeny="";
$musorok="";
$aznap="";

while($sor=$stmt->fetch()){
    extract($sor);
  $d_eredmeny.="<option value='{$EDatum}'>{$EDatum}</option>";
}

if(isset($_POST['btn'])){
    $EDatum=$_POST['datum'];
    $sql="SELECT fCim,Eido1,Eido2,Eido3,Eido4 from filmek inner join eloadasok on filmek.fId=eloadasok.FId where EDatum='{$EDatum}' order by fCim;";
    $stmt=$db->query($sql);

    while($sor=$stmt->fetch()){
        extract($sor);
        $aznap="{$EDatum} napi vetítéseink";
        $musorok.="
        <tr><td>{$fCim}</td><td>{$Eido1}</td><td>{$Eido2}</td><td>{$Eido3}</td><td>{$Eido4}</td></tr>";
        }
    }

?>

<form method="post">
<div class="center">
    <div class="">
    <select id="datum" name="datum">
        <?=$d_eredmeny?>    
    </select>    
    <input type="submit" class="btn btn-danger btn-sm" name="btn" value="Választ">
    </div>

    <div class="aznap">
    <h1><?=$aznap?></h1>
    </div>
</div>
</form>

<div class="table-responsive">
<table class="musortabla table table-striped table-dark center">
<thead><th>Film címek</th><th class="text-center" colspan="4">Időpontok</th>
</thead>
<tbody>
<?=$musorok?>
</tbody>
</table>
</div>
<footer class="fixed-bottom">