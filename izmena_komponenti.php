<?php
include_once ('dbconfig.php');

$ID = (int) @$_REQUEST['ID'];

$rezultat = mysqli_query($bp, "select * from komponente where ID=$ID");
if (!$rezultat) die(mysqli_error($bp));
$Komponenta = mysqli_fetch_object($rezultat);
if (!$Komponenta) die('Ne postoji ta komponenta');
?>
<html>
<body>
<form action="izmena_komponenti_db.php" method="post">
    <input type="hidden" name="ID" value="<?php echo $Komponenta->ID; ?>" />
    <input type="hidden" name="Racunar_ID" value="<?php echo $Komponenta->Racunar_ID; ?>" />

    <input type="text" placeholder="Naziv" name="Naziv" value="<?php echo $Komponenta->Naziv; ?>" /><br />
    Jed. mere:
    <select name="JedinicaMere">
        <option value="kom" <?php if ($Komponenta->JedinicaMere == 'kom') echo 'selected'; ?>>Komad</option>
        <option value="kg" <?php if ($Komponenta->JedinicaMere == 'pak') echo 'selected'; ?>>Pakovanje</option>
    </select><br />
    Kolicina: <input type="number" name="Kolicina" value="<?php echo $Komponenta->Kolicina; ?>" /><br />
    <button type="submit">
        Izmena
    </button>
</form>
</body>
</html>