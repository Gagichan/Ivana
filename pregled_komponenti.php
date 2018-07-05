<?php
include_once ('dbconfig.php');

$ID = (int) @$_REQUEST['Racunar_ID'];

$rezultat = mysqli_query($bp, "select * from racunar where ID=$ID");
if (!$rezultat) die(mysqli_error($bp));
$Racunar = mysqli_fetch_object($rezultat);
if (!$Racunar) die('Ne postoji taj racunar');
?>
<html>
<body>
<h1><?php echo $Racunar->Naziv; ?> - Pregled komponenti</h1>
<table border=1>
    <tr>
        <td>ID</td>
        <td>Naziv</td>
        <td>JedinicaMere</td>
        <td>Kolicina</td>
    </tr>
    <?php
    $rezultat = mysqli_query($bp, "select * from komponente where Racunar_ID={$Racunar->ID} order by Naziv asc");
    if (!$rezultat) die(mysqli_error($bp));
    while ($red = mysqli_fetch_object($rezultat))
    {
        echo "<tr>";
        echo "<td>{$red->ID}</td>";
        echo "<td>{$red->Naziv}</td>";
        echo "<td>{$red->JedinicaMere}</td>";
        echo "<td>{$red->Kolicina}</td>";
        echo "<td><a href='izmena_komponenti.php?ID={$red->ID}'>Izmena</a></td>";
        echo "<td><a href='uklanjanje_komponenti.php?ID={$red->ID}'  onclick = 'if(!confirm(\"Da li ste sigurni\")) return false;'>Uklanjanje</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<a href="dodavanje_komponenti.php?Racunar_ID=<?php echo $Racunar->ID; ?>">Dodavanje Komponenti</a>
<a href="index.php">Racunari</a>
</body>
</html>