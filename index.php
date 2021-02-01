<?php
if(!empty($_POST['name'])){
    $pdo = new PDO('mysql:host=localhost;dbname=geek', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    try {
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $center = $_POST['center'];
        $com = $_POST['com'];
        $sql = $pdo->query("INSERT INTO rdv (name, tel, email, center, com) 
            VALUES
            ('$name', '$tel', '$email', '$center', '$com')");
    } catch (Exeception $e) {
        echo '<script>alert("Une erreur c\'est produite. Veuiller ressayer")</script>';
    }
}
?>
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
        <div id="infoGray">
            <h2>Centre Gray</h2>
            <h3>Adresse</h3>
            <p>6 Rue Gambetta</p>
            <h3 class="time">Horaire</h3>
            <p>lundi à vendredi 08:30–12:00, 13:30–17:00</p>
            <p>samedi et dimanche Fermé</p>
            <p>Téléphone : 03 84 76 90 83</p>
        </div>
        <div id="infoVienne">
        <h2>Centre Vienne</h2>
            <h3>Adresse</h3>
            <p>30 Avenue Général Leclerc</p>
            <h3 class="time">Horaire</h3>
            <p>lundi à vendredi 08:30–12:00, 13:30–17:00</p>
            <p>samedi et dimanche Fermé</p>
            <p>Téléphone : 03 84 76 52 44</p>
        </div>
        <div id="infoBeynost">
            <h2>Centre Beynost</h2>
            <h3>Adresse</h3>
            <p>110 Rue du Chat Botté</p>
            <h3 class="time">Horaire</h3>
            <p>lundi à vendredi 08:30–12:00, 13:30–17:00</p>
            <p>samedi et dimanche Fermé</p>
            <p>Téléphone : 03 84 76 52 44</p>
        </div>
    </div>
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
            <option value="gray">Gray</option>
            <option value="vienne">Vienne</option>
            <option value="beynost">Beynost</option>
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