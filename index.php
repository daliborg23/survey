<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prehled otazek a odpovedi</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="index.php">Prehled</a></li>
            <li><a href="vlozeniotazky.php">Vlozeni otazky</a></li>
        </ul>
    </header>

<?php 
if (isset($_GET['id'])) {
    if (!($con = mysqli_connect("innodb.endora.cz", "uzivatel112233", "Heslo1", "cviceniphp")))
    {
        die("Nelze se pripojit k databazovemu serveru!</body></html>");
    }
    mysqli_query($con, "SET NAMES 'utf8'");
    if (!($vysledek = mysqli_query($con,"UPDATE `odpovedi` SET `pocet_hlasu` = `pocet_hlasu` + '1' WHERE `odpovedi`.`id_odpovedi` = '". addslashes($_GET['id']) ."'"))) 
    {
        die("Nelze provest dotaz.</body></html>");
    }

}
?>

<?php
if (!($con = mysqli_connect("innodb.endora.cz", "uzivatel112233", "Heslo1", "cviceniphp"))) {
    die("Nelze se pripojit k databazovemu serveru!</body></html>");
}
mysqli_query($con, "SET NAMES 'utf8'");
if (
!($vysledek = mysqli_query(
$con,
"SELECT id_otazky, text_otazky FROM anketniotazky"
))
) {
    die("Nelze provest dotaz.</body></html>");
}

?>

<?php while ($item = mysqli_fetch_array($vysledek)) { ?>
        <table border="1"  style="width: 400px;">
        <tr>
            <th>ID Otazky:</th>
            <td><?php echo $item['id_otazky']; ?></td>
        </tr>
        <tr>
            <th>Dotaz:</th>
            <td><?php echo $item['text_otazky']; ?></td>
        </tr>
        <tr>
            <th>Odpoved</th>
            <td>Hodnoceni</td>
        </tr>
        
        <?php
    if (!($vysledekOdp = mysqli_query($con, "SELECT id_odpovedi, id_otazky_odpoved, text_odpovedi, pocet_hlasu FROM odpovedi WHERE id_otazky_odpoved = '" . $item['id_otazky'] . "'"))) {
        die("Nelze provest dotaz.</body></html>");
    }
    else {
        while ($itemOdp = mysqli_fetch_array($vysledekOdp)) { ?>
            <tr>
                <td>
                    <?php echo $itemOdp['text_odpovedi']; ?>
                </td>
                <td>
                    <a href="?id=<?php echo $itemOdp['id_odpovedi'] ?>"><?php echo $itemOdp['pocet_hlasu']; ?></a>
                </td>
            </tr>
    <?php
        }?>
        </td>
        </table>
    <?php
    }
    ?>
    <br/>
<?php 
}
mysqli_close($con); ?>
</body>
</html>