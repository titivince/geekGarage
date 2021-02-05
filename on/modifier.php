<?php
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
if(isset($_SESSION["connected"]) && $_SESSION["connected"] == "yes" ) {

    $pdo = new PDO('mysql:host=localhost;dbname=geek', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../src/style.css">
        <title>Modifer</title>
    </head>
    <body style="background-image: none; background-color: #888">
    <div style="height: 100vh; display: block;">
        <?php

        if(isset($_POST['center'])){

            $center = $_POST['center'];
            $lat = $_POST['lat'];
            $lon = $_POST['lon'];
            $adress = $_POST['adress'];
            $tel = $_POST['tel'];

            $sql = $pdo->query("UPDATE center SET 
            center = '$center', lat = '$lat', lon = '$lon', adress = '$adress', tel ='$tel' WHERE center = '$center' ");
            echo '<h2>Centre de ' . $center .' à bien été modifié</h2>';
        } elseif(!isset($_GET['center'])) {

            $sql = $pdo->query("SELECT * FROM center");
            $mods = $sql->fetchAll(); ?>

            <form action="" method="GET">
                <h2>Selectionner un centre</h2>
                <select name="center" required>
                    <option value="">-selectionner un centre-</option>
                    <?php foreach($mods as $mod) : ?>
                        <option value="<?= $mod['center']?>"><?= $mod['center']?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Rechercher">
            </form>
        <?php } else {

            $center = $_GET['center'];
            $sql = $pdo->query("SELECT * FROM center WHERE center = '$center'");
            $mods = $sql->fetch(); ?>

            <form action="" method="POST">
                <h2>Modifer un centre</h2>
                <label>Nom du centre</label>
                <input type="text" name="center" value="<?=$mods['center'] ?>" required>
                <label>Lattitude</label>
                <input type="text" name="lat" value="<?=$mods['lat'] ?>" required>
                <label>Longitude</label>
                <input type="text" name="lon" value="<?=$mods['lon'] ?>" required>
                <label>Adresse</label>
                <input type="text" name="adress" value="<?=$mods['adress'] ?>" required>
                <label>Telephone</label>
                <input type="text" name="tel"  value="<?=$mods['tel'] ?>" required>
                <input type="submit" value="Modifier">
            </form>
        </div>
    </body>
    </html>
    <?php }
} else { header("HTTP/1.1 403 Forbidden"); }?>