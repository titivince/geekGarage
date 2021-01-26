<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/style.css">
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
                <h3><span>Ó</span>NLINE</h3>
                <p>Vous acceuil pour vous aider avec son expériences</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores obcaecati nisi quae consequatur! Repudiandae, fugiat non!</p>
            </div>
            <img src="src/dev.jpg" alt="dev team">
        </div>
        <div>
            <button id="open-button" >Nous contacter</button>
        </div>
    </div>
    
    <!-- Pop up block -->
    <div class="form-popup" id="myForm">
      <form action="" method="POST" class="form-container">
        <h2>Contact</h2>
        <label for="name">Nom / Prenom</label>
        <input type="text" placeholder="Votre Nom / Prenom" name="name" required>

        <label for="phone">Telephone</label>
        <input type="tel" name="email" required>

        <label for="email">Email</label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="com">Commentaire</label>
        <textarea placeholder="Plus d'information" name="com" required></textarea>

        <button type="submit" class="btn">Envoyer</button>
        <button type="button" class="btn cancel" >Fermer</button>
      </form>
    </div>
</body>
</html>