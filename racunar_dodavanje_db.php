<?php
include_once ('dbconfig.php');

$Naziv = mysqli_real_escape_string($bp, @$_REQUEST['Naziv']);

$upit = "insert into racunar (Naziv) values ('$Naziv')";

$rezultat = mysqli_query($bp, $upit);
if (!$rezultat) {
    die(mysqli_error($bp));
}
header('Location: index.php');