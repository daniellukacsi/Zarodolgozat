<?php
require_once "config.php";
print_r($_GET);
$id=$_GET['id'];
$sql="delete from visszajelzes where uId={$id}";
$db->exec($sql);

header("Location:admin.php");
?>