<?php
if(isset($_POST['center'])) {
   $pdo = new PDO('mysql:host=localhost;dbname=geek', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    $center = $_POST['center'];
    $sql = $pdo->query("SELECT * FROM rdv WHERE center = '$center'");
    $rdvs = $sql->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/style.css">
    <title>RDV</title>
</head>
<body>
    <form action="" method="POST">
        <select name="center">
            <option value="gray">Gray</option>
            <option value="vienne">Vienne</option>
            <option value="beynost">Beynost</option>
        </select>
        <input type="submit" value="Rechercher">
    </form>
    <h2>Pour le centre de <?=$_POST['center']; ?></h2>
    <?php foreach ($rdvs as $rdv) { ?>
        <div>
            <h3><?= $rdv['name']; ?></h3>
            <p>Mail : <?= $rdv['email'];?></p>
            <?php if(!empty($rdv['tel'])) { ?>
                <p>Télephone : 0<?= $rdv['tel']; } ?></p>
            <p>Information : <?= $rdv['com'];?></p>
        </div>
    <?php }?>
</body>
</html>