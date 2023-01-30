<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vlozeni otazky</title>
</head>
<body>
      <header>
        <ul>
            <li><a href="index.php">Prehled</a></li>
            <li><a href="vlozeniotazky.php">Vlozeni otazky</a></li>
        </ul>
    </header>
<?php
if (isset($_POST["odeslat_otazku"])) {

  if (!($con = mysqli_connect("innodb.endora.cz", "uzivatel112233", "Heslo1", "cviceniphp"))) {
    die("Nelze se pripojit k databazovemu serveru!</body></html>");
  }
  mysqli_query($con, "SET NAMES 'utf8'");
  if (
  mysqli_query(
  $con,
  "INSERT INTO anketniotazky(text_otazky) VALUES('" . addslashes($_POST["dotaz"]) . "')"
  )
  ) {
    echo "Uspesne vlozeno.";
  }
  else {
    echo "Nelze provest dotaz. " . mysqli_error($con);
  }

}
?>    
    Vypis otazek:
    
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
            <td colspan="2"><a href="detailotazky.php?id=<?php echo $item["id_otazky"]; ?>">Detail otazky</a></td>
        </tr>
    </table>
    <br/>
    <?php
}?>

    Vlozeni otazky do databaze:
    <form action="" method="POST">
        <textarea name="dotaz" rows="4" cols="20">Napiste dotaz</textarea>
        <input type="submit" value="Vlozit otazku" name="odeslat_otazku"/>
    </form>
    <?php mysqli_close($con); ?>
</body>
</html>