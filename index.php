<html>
<head>
    <meta charset="UTF-8">
    <title>IvanaPhP</title>
</head>
<body>
<table border=1>
    <tr>
        <td>ID</td>
        <td>Racunar</td>
        <td></td>
        <td></td>
    </tr>
    <?php
    include_once ('dbconfig.php');
    $rezultat = mysqli_query($bp, 'select * from racunar order by Naziv asc');
    if (!$rezultat) die(mysqli_error($bp));

    while ($red = mysqli_fetch_object($rezultat))
    {
        echo "<tr>";
        echo "<td>{$red->ID}</td>";
        echo "<td>{$red->Naziv}</td>";
        echo "<td><a href='racunar_izmena.php?ID={$red->ID}'>Izmena</a></td>";
        echo "<td><a href='uklanjanje_racunara.php?ID={$red->ID}'  onclick = 'if(!confirm(\"Da li ste sigurni\")) return false;'>Uklanjanje</a></td>";
        echo "<td><a href='dodavanje_komponenti.php?Racunar_ID={$red->ID}'>Dodavanje komponenti</a></td>";
        echo "<td><a href='pregled_komponenti.php?Racunar_ID={$red->ID}'>Pregled komponenti</a></td>";
        echo "</tr>";
    }
    echo "<a href = 'dodavanje_racunara.html'>Dodavanje racunara</a>";
    ?>
</body>
</html>