<?php
include_once ('dbconfig.php');

$ID = (int) @$_REQUEST['ID'];

$upit = "delete from racunar where ID=$ID";

$rezultat = mysqli_query($bp, $upit);
if (!$rezultat){
    die(mysqli_error($bp));
}
header('Location: index.php');