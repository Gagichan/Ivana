<?php
include_once ('dbconfig.php');

$ID = (int) @$_REQUEST['ID'];

$upit = "select * from komponente where ID=$ID";
$rezultat = mysqli_query($bp, $upit);

if (!$rezultat) {
    die(mysqli_error($bp));
}
$Komponenta = mysqli_fetch_object($rezultat);

$upit1 = "delete from komponente where ID=$ID";
$rezultat1 = mysqli_query($bp, $upit1);
if (!$rezultat1) {
    die(mysqli_error($bp));
}
header("Location: pregled_komponenti.php?Racunar_ID=$Komponenta->Racunar_ID");