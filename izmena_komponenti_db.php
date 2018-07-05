<?php
include_once ('dbconfig.php');

$Racunar_ID = (int)$_REQUEST['Racunar_ID'];
$ID = (int) @$_REQUEST['ID'];
$Naziv = mysqli_real_escape_string($bp, @$_REQUEST['Naziv']);
$JedinicaMere = mysqli_real_escape_string($bp, @$_REQUEST['JedinicaMere']);
$Kolicina = mysqli_real_escape_string($bp, @$_REQUEST['Kolicina']);

$upit = "update komponente set Naziv='$Naziv', JedinicaMere='$JedinicaMere', Kolicina='$Kolicina' where ID=$ID";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat) {
    die(mysqli_error($bp));
}
header("Location: pregled_komponenti.php?Racunar_ID=$Racunar_ID");