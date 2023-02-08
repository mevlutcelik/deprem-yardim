<?php
$domain = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER["HTTP_HOST"];
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'];
date_default_timezone_set("Europe/Istanbul");
?>
<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Deprem - Yardım</title>
</head>

<body>

<?php

try {

    $baglanti = new PDO("mysql:host=localhost;dbname=depremyardim_me", "depremyardim_me", "AxgjT7Kz4Mbg");
    $baglanti->exec("SET NAMES utf8");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sorgu = $baglanti->prepare("SELECT * FROM yardim_cagrisi LIMIT 10");
    $sorgu->execute();

    echo "<pre>";
    while ($cikti = $sorgu->fetch(PDO::FETCH_OBJ)) {


        print_r($cikti);


    }
    echo "</pre>";
} catch (PDOException $e) {
    die($e->getMessage());
}

$baglanti = null;

?>

</body>

</html>