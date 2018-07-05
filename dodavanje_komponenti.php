<?php
include_once ('dbconfig.php');

$ID = (int) @$_REQUEST['Racunar_ID'];

$upit="select * from racunar where ID=$ID";

$rezultat = mysqli_query($bp, $upit);
if (!$rezultat){
    die(mysqli_error($bp));
}
$Racunar = mysqli_fetch_object($rezultat);
if (!$Racunar) {
    die('Ne postoji taj Racunar');
}
?>
<html>
<body>
<h1><?php echo $Racunar->Naziv; ?> - dodavanje komponenti</h1>
<form action="dodavanje_komponenti_db.php" method="post">
    <input type="hidden" name="Racunar_ID" value="<?php echo $Racunar->ID; ?>" />
    <input type="text" placeholder="Naziv komponente" name="Naziv" /><br />
    Jed. mere:
    <select name="JedinicaMere">
        <option value="kom">Komad</option>
        <option value="pak">Pakovanje</option>
    </select><br />
    Kolicina: <input type="number" name="Kolicina" /><button type="submit">Dodaj</button>
</form>
</body>
</html>