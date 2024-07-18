<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" type="text/css" href="CSS/welcome.css">   
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <form action="/submit_login" method="post">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" required>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            <a href="acceuil.php">Se connecter</a>
        </form>
    </div>
</body>
</html>