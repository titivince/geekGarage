<?php
if(isset($_GET['center'])) {
   $pdo = new PDO('mysql:host=localhost;dbname=geek', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    $center = $_GET['center'];
    $sql = $pdo->query("SELECT * FROM rdv WHERE center = '$center'");
    $rdvs = $sql->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/style.css">
    <title>RDV</title>
</head>
<body>
    <div style="height: 100vh; display: block;">
        <?php if(!empty($_GET['center'])) { echo '<h1>Pour le centre de ' . $_GET['center'] . '</h1>'?>
        <div style="flex-flow: wrap">
            <?php foreach ($rdvs as $rdv) : ?>
                <div class="list">
                    <h3><?= $rdv['name']; ?></h3>
                    <p>Mail : <?= $rdv['email'];?></p>
                    <?php if(!empty($rdv['tel'])) { ?>
                        <p>Télephone : 0<?= $rdv['tel']; } ?></p>
                    <p>Information : <?= $rdv['com'];?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?php }?>
        <form action="" method="GET">
            <h2>Selectionner un centre</h2>
            <select name="center">
                <option value="gray">Gray</option>
                <option value="vienne">Vienne</option>
                <option value="beynost">Beynost</option>
            </select>
            <input type="submit" value="Rechercher">
        </form>
    </div>
</body>
</html>