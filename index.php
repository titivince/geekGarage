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
        <button class="open-button" onclick="openForm()">Open Form</button>
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
        <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
      </form>
    </div>
</body>
</html>