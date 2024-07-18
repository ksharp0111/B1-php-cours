

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page avec Header, Footer, et Navigation</title>
    <link rel="stylesheet" type="text/css" href="CSS/inventaire.css">
    <style>


    </style>
</head>
<body>
    <header>
        <h1>Inventaire</h1>
    </header>
    <div class="container">
        <nav>
            <ul>
                <li><a href="acceuil.php">Accueil</a></li>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Accueil</a></li>
            </ul>
        </nav>
        <div class="main-content">
<?php
// votre code PHP pour se connecter à la base de données et récupérer les données
$connection_string = 'mysql:host=localhost;dbname=bdd_pharmatruc'; // Remplacez par vos informations de connexion
$user = 'root'; // Remplacez par vos informations de connexion
$pass = ''; // Remplacez par vos informations de connexion
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($connection_string, $user, $pass, $options);
    $sql = "SELECT id, nom_du_medoc, forme, date_de_peremption, Dose, stock FROM stockmedoc;";
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute();
    $result = $stmt->fetchAll();
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="CSS/home.css">
  <title>Pharmatruc</title>
</head>

<body>
 
  <section id="content">
    <h1 class="content-header">Inventaire</h1>

    <table>
      <tr>
        <th>id</th>
        <th>nom_du_medoc</th>
        <th>forme</th>
        <th>date_de_peremption</th>
        <th>Dose</th>
        <th>Stock</th>
        <th>Details</th>
      </tr>

      <?php if ($result) { ?>

        <?php foreach ($result as $stockmedoc) { ?>

          <tr>
            <td><?= $stockmedoc["id"] ?></td>
            <td><?= $stockmedoc["nom_du_medoc"] ?></td>
            <td><?= $stockmedoc["forme"] ?></td>
            <td><?= $stockmedoc["date_de_peremption"] ?></td>
            <td><?= $stockmedoc["Dose"] ?></td>
            <td><?= $stockmedoc["stock"] ?></td>
            <td><form action="modifstock.php"><input type="hidden" name="id" value="<?= $stockmedoc["id"] ?>" /><input type="submit" value="detail" /></form></td>
          
        </tr>
        
        <?php } ?>
      
        <?php } else { ?>
        
            <tr>
          <td colspan="7">Aucun résultat trouvé</td>
        </tr>
      <?php } 
      ?>

    </table>
  </section>
  
  </div>
    </div>
    <footer>
        <p>&copy; 2024 Mon Site Web</p>
    </footer>
</body>
</html>
</body>
</html>