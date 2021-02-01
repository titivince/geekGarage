<?php
$login = 'root';
$password = 'root';

if($login == $_POST['login'] && $password == $_POST['password']) {
    header('location: rdv.php');
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
    <div style="height: 100vh; display: block">
        <form action="" method="POST">
            <h2>Connection</h2>
            <input type="text" name="login" required>
            <input type="text" name="password" required>
            <input type="submit" value="Connection">
        </form>
    </div>
</body>
</html>