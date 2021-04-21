<?php
require_once "config.php";
print_r($_GET);
$id=$_GET['id'];
$sql="delete from filmek where fId={$id}";
$db->exec($sql);

header("Location:admin.php");
?>