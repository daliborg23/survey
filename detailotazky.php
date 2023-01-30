<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail otazky</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="index.php">Prehled</a></li>
            <li><a href="vlozeniotazky.php">Vlozeni otazky</a></li>
        </ul>
    </header>
 <?php // vlozeni odpovedi k otazce
if (isset($_POST["odeslat_odpoved"])) {

    if (!($con = mysqli_connect("innodb.endora.cz", "uzivatel112233", "Heslo1", "cviceniphp"))) {
        die("Nelze se pripojit k databazovemu serveru!</body></html>");
    }
    mysqli_query($con, "SET NAMES 'utf8'");
    if (
    mysqli_query(
    $con,
    "INSERT INTO odpovedi(id_otazky_odpoved, text_odpovedi) VALUES('" . addslashes($_GET["id"]) . "', '" . addslashes($_POST["odpoved"]) . "')"
    )
    ) {
        echo "Uspesne vlozeno.";
    }
    else {
        echo "Nelze provest dotaz. " . mysqli_error($con);
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
"SELECT id_otazky, text_otazky FROM anketniotazky WHERE id_otazky = '" . addslashes($_GET["id"]) . "'"))
) {
    die("Nelze provest dotaz.</body></html>");
}
?>
        <a href="vlozeniotazky.php">Zpet</a>
        
        <h3>Detail otazky:</h3>
        <?php while ($item = mysqli_fetch_array($vysledek)) { ?>
            <table border="1"  style="width: 400px;">
            <tr>
                <th>ID Otazky:</th>
                <td><?php echo $_GET['id']; ?></td>
            </tr>
            <tr>
                <th>Dotaz:</th>
                <td><?php echo $item['text_otazky']; ?></td>
            </tr>
            <!-- <tr>
                <td colspan="2">...</td>
            </tr> -->
        </table>
        <br/>
        <?php
}?> 

    <h2>Vypis odpovedi</h2>
    <?php
if (!($con = mysqli_connect("innodb.endora.cz", "uzivatel112233", "Heslo1", "cviceniphp"))) {
    die("Nelze se pripojit k databazovemu serveru!</body></html>");
}
mysqli_query($con, "SET NAMES 'utf8'");
if (
!($vysledek = mysqli_query(
$con,
"SELECT * FROM odpovedi"
))
) {
    die("Nelze provest dotaz.</body></html>");
}
?>
    <?php // zobrazeni odpovedi k otazce

while ($item = mysqli_fetch_array($vysledek)) {
    if ($_GET["id"] == $item['id_otazky_odpoved']) {
?>
        <table border="1"  style="width: 400px;">
        <tr>
            <th>ID Otazky: pro kontrolu</th>
            <td><?php echo $item['id_otazky_odpoved']; ?></td>
        </tr>
        <tr>
            <th>ID odpovedi:</th>
            <td><?php echo $item['id_odpovedi']; ?></td>
        </tr>
        <tr>
            <th>Odpoved:</th>
            <td><?php echo $item['text_odpovedi']; ?></td>
        </tr>
    </table>
    <br/>
    <?php
    }
}?>

    Vlozeni odpovedi do databaze:
    <form action="" method="POST">
        <textarea name="odpoved" rows="4" cols="20">Napiste odpoved</textarea>
        <input type="submit" value="Vlozit odpoved" name="odeslat_odpoved"/>
    </form>
<?php

mysqli_close($con); ?>
</body>
</html>