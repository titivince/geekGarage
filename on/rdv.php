<?php
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
if(isset($_SESSION["connected"]) && $_SESSION["connected"] == "yes" ) {

    $pdo = new PDO('mysql:host=localhost;dbname=geek', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $sql = $pdo->query("SELECT center FROM center");
    $center = $sql->fetchAll();

    if(isset($_GET['center'])) {

        $name = $_GET['center'];

        if($name == "all") {
            $sql = $pdo->query("SELECT * FROM rdv");
        } else {
            $sql = $pdo->query("SELECT * FROM rdv WHERE center = '$name'");
        }
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
    <body style="background-image: none; background-color: #888">
        <div style="height: 100vh; display: block;">
            <?php if(!empty($_GET['center'])) {
                echo '<h1 style="position: static; transform: none">Pour le centre de ' . $_GET['center'] . '</h1>'?>
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
            <?php } ?>
            <form action="" method="GET">
                <h2>Selectionner un centre</h2>
                <select name="center">
                    <option value="all">-tous les centres-</option>
                    <?php foreach($center as $c) : ?>
                        <option value="<?= $c['center']; ?>"><?= $c['center']; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Rechercher">
            </form>
        </div>
    </body>
    </html>
<?php
} else { header("HTTP/1.1 403 Forbidden"); } ?>