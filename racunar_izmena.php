<?php
include_once ('dbconfig.php');

$ID = (int) @$_REQUEST['ID'];

$upit="select * from racunar where ID=$ID";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat) {
    die(mysqli_error($bp));
}
$Racunar = mysqli_fetch_object($rezultat);
if (!$Racunar){
    die('Ne postoji taj racunar');
}
?>
<html>
<body>
<form action="racunar_izmena_db.php" method="post">
    <input type="hidden" name="ID" value="<?php echo $Racunar->ID; ?>" />
    <input type="text" placeholder="Naziv Racunara" name="Naziv" value="<?php echo $Racunar->Naziv; ?>" />
    <button type="submit">Izmeni</button>
</form>
</body>
</html>