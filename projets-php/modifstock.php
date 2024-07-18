<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModifStock</title>
    <link rel="stylesheet" type="text/css" href="CSS/inventaire.css">
</head>
<body>
    <header>
        <h1>Mon Site Web</h1>
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

    <?php
$pdo = new PDO('mysql:host=localhost;dbname=bdd_pharmatruc','root','');  // connexion à la base de données

if (isset($_GET["id"])) {      // La fonction isset() vérifie si la variable $_GET["id"] est définie et n'est pas NULL.
    $id = $_GET["id"];      /* Si la variable $_GET["id"] est définie, sa valeur est assignée à la variable $id. 
                             * La superglobale $_GET contient les données envoyées par la méthode GET dans l'URL 
                            */
    $sql = "SELECT * FROM stockmedoc WHERE id = :id";   // requête SQL préparée et le :id est ce qui est remplacé à l'exécution              
    $stmt = $pdo->prepare($sql);    // stmt est une variable qui contient une requête préparée (prepare statement)
    $stmt->execute(['id' => $id]);  // exécution de la requête préparée de l'objet stmt le tableau ['id' => $id] est passé en paramètre la méthode execute() 
                                    // Dans ce cas, la clé id est liée à la valeur de la variable $id
    $targetedStock = $stmt->fetch();    // La méthode fetch() de l'objet $stmt est appelée pour récupérer les résultats de la requête exécutée
                                        // La méthode fetch() retourne un tableau associatif qui contient les données de la ligne courante
                                        // le résultat est stocké dans la variable $targetStock
}
?>

<!-- Formulaire HTML -->
<form action="modifstock.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $targetedStock["id"]; ?>">  
    <input name="nom" value="<?php echo $targetedStock["nom_du_medoc"]; ?>"> 
    <p>Forme du médicament <input name="forme" value="<?php echo $targetedStock["forme"]; ?>"></p>
    <p>Stock <input name="stock" value="<?php echo $targetedStock["stock"]; ?>"></p>
    <input type="submit" value="Valider">
</form>

   
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



