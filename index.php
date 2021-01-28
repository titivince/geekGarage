<?php
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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores obcaecati nisi quae consequatur! Repudiandae, fugiat non!</p>
                <h4>DIAGNOSTIC</h4>
                <h4>INSTALATION SOFTWARE</h4>
                <h4>MAINTENANCE</h4>
                <h4>REMASTER</h4>
            </div>
            <img src="src/dev.jpg" alt="dev team">
        </div>
        <div>
            <button id="open-button" >Nous contacter</button>
        </div>
    </div>
    <!-- Map block -->
    <div class="map-block">
        <div id="map"></div>
        <!-- center info block -->
        <div id="infoGray">
            <h4>Horaire</h4>
            <p>lundi à vendredi 08:30–12:00, 13:30–17:00</p>
            <p>samedi et dimanche Fermé</p>
            <p>Téléphone : 03 84 76 90 83</p>
        </div>
        <div id="infoVienne">
            <h4>Horaire</h4>
            <p>lundi à vendredi 08:30–12:00, 13:30–17:00</p>
            <p>samedi et dimanche Fermé</p>
            <p>Téléphone : 03 84 76 52 44</p>
        </div>
        <div id="infoBeynost">
            <h4>Horaire</h4>
            <p>lundi à vendredi 08:30–12:00, 13:30–17:00</p>
            <p>samedi et dimanche Fermé</p>
            <p>Téléphone : 03 84 76 52 44</p>
        </div>
    </div>
    
    <!-- Pop up block -->
    <div class="form-popup" id="parentForm">
      <form id="childForm" action="" method="POST" class="form-container">
        <h2>Contact</h2>
        <label for="name">Nom / Prenom</label>
        <input type="text" name="name" required>

        <label for="phone">Telephone</label>
        <input type="tel" name="tel" maxlength="12">

        <label for="email">Email</label>
        <input type="email" name="email" minlength="5" required>

        <label for="center">Centre</label>
        <select name="center" required>
            <option value="">-sélectionnez un centre-</option>
            <option value="gray">Gray</option>
            <option value="vienne">Vienne</option>
            <option value="beynost">Beynost</option>
        </select>

        <label for="com">Commentaire</label>
        <textarea placeholder="Plus d'information" name="com" required></textarea>

        <button type="submit" class="btn">Envoyer</button>
      </form>
    </div>
    <footer>
        <p>Lorem ipsum dolor sit recusandae.</p>
    </footer>
</body>
</html>