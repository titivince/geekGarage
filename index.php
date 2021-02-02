<?php
$pdo = new PDO('mysql:host=localhost;dbname=geek', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
$pos = $pdo->query("SELECT * FROM center");

$pos = $pos->fetchAll();

if(!empty($_POST['name'])){
    try {
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $center = $_POST['center'];
        $com = $_POST['com'];
        $sql = $pdo->query("INSERT INTO rdv (name, tel, email, center, com) 
            VALUES
            ('$name', '$tel', '$email', '$center', '$com')");
        ?> <!--
        use PHPMailer/PHPMailer/PHPMailer;
        use PHPMailer/PHPMailer/Exception;

        /* Exception class */
        require 'PHPMailer/src/Exception.php';
        /* The main PHPMailer class */
        require 'PHPMailer/src/PHPMailer.php';
        /* SMTP class, needed if you want to use SMTP */
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(TRUE);
        
        /* Set the mail sender */
        $mail->setFrom('', $name);

        /* Set the subject */
        $mail->Subject = "Demande de réparation"; // subject
        
        /* Set the mail resever */
        if($center == "gray") {
            $mail->addAddress('');
        } elseif($center == "beynost") {
            $mail->addAddress('');
        } elseif ($center == "vienne") {
            $mail->addAddress('');
        } else {
            $mail->addAddress('');
            $mail->Subject = $center . "Demande de réparation";
        }
        
        /* Set the mail message body */
        $mail->Body = "le message : " . $com . " Le mail : " . $email . "Le telephone :" . $tel;

        /* Enable SMTP debug output */
        $mail->SMTPDebug = 0; // 2
 
        /* SMTP parameters */
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // host localhost
        $mail->SMTPAuth = TRUE; // TRUE false
        $mail->SMTPSecure = 'tls'; // ssl
        $mail->Username = ''; //  mail adresse
        $mail->Password = '';  // password
        $mail->Port = 587; // port 587
 
        /* Disable some SSL checks */
        $mail->SMTPOptions = array(
           'ssl' => array(
           'verify_peer' => false,
           'verify_peer_name' => false,
           'allow_self_signed' => true
           )
        )
        /* Send the mail */
        $mail->send(); --> <?php
        $s = '<script>alert("Vos information ont bien été envoyé")</script>';
    } catch (Exeception $e) {
        echo '<script>alert("Une erreur c\'est produite. Veuiller ressayer")</script>';
    }
}
?>
<script>const center = <?= json_encode($pos);?>;</script>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/style.css">
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script src="src/script.js"></script>
    <title>Geek garage</title>
</head>
<body>
    <div>
        <img src="src/title.png" alt="titre">
    </div>
    <div>
        <h2 class="title">Reparation d'ordinateur</h2>
    </div>
    <!-- Info block -->
    <div class="info">
        <div class="main-info">
            <div>
                <h2><span>Ó</span>NLINE</h2>
                <p>Vous acceuil pour vous aider avec son expériences</p>
                <p>Pour le</p>
                <h3>DIAGNOSTIC</h3>
                <h3>INSTALATION SOFTWARE</h3>
                <h3>MAINTENANCE</h3>
                <h3>REMASTER</h3>
            </div>
            <img src="src/dev.jpg" alt="dev team">
        </div>
        <div>
            <button id="open-button" >Nous contacter</button>
        </div>
    </div>
    <h2 class="map-title">Nous retrouver</h2>
    <!-- Map block -->
    <div class="map-block">
        <div id="map"></div>
        <!-- center info block -->
        <div id="mapInfo">
            <h2 id="center">Centre </h2>
            <h3>Adresse</h3>
            <p id="adress"></p>
            <h3 class="time">Horaire</h3>
            <p>lundi à vendredi 08:30–12:00, 13:30–17:00</p>
            <p>samedi et dimanche Fermé</p>
            <p id="tel">Téléphone : </p>
        </div>
    </div>
    <?php if(isset($s)) { echo $s; } ?>
    <!-- Pop up block -->
    <div class="form-popup" id="parentForm">
      <form id="childForm" action="" method="POST">
        <h2>Contact</h2>
        <label for="name">Nom / Prenom *</label>
        <input type="text" name="name" required>

        <label for="phone">Telephone</label>
        <input type="tel" name="tel" placeholder="0123456789" maxlength="12">

        <label for="email">Email *</label>
        <input type="email" name="email" minlength="5" required>

        <label for="center">Centre</label>
        <select name="center" required>
            <option value="">-sélectionnez un centre-</option>
            <?php foreach($pos as $posCenter) { ?>
            <option value="<?= $posCenter['center']?>"><?= $posCenter['center']?></option>
            <?php } ?>
        </select>

        <label for="com">Commentaire *</label>
        <textarea placeholder="Plus d'information" name="com" required></textarea>
        <p>* Champ obligatiore</p>
        <input type="submit" value="Envoyer">
      </form>
    </div>
    <footer>
        <p>Lorem ipsum dolor sit recusandae.</p>
    </footer>
</body>
</html>