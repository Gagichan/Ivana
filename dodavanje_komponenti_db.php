<?php
include_once ('dbconfig.php');

$Racunar_ID = (int) @$_REQUEST['Racunar_ID'];
$Naziv = mysqli_real_escape_string($bp, @$_REQUEST['Naziv']);
$JedinicaMere = mysqli_real_escape_string($bp, @$_REQUEST['JedinicaMere']);
$Kolicina = mysqli_real_escape_string($bp, @$_REQUEST['Kolicina']);

$upit = "insert into komponente (Racunar_ID, Naziv, JedinicaMere, Kolicina) values ('$Racunar_ID','$Naziv','$JedinicaMere','$Kolicina')";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat){
    die(mysqli_error($bp));
}
header("Location: pregled_komponenti.php?Racunar_ID=$Racunar_ID");