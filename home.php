<?php 

$host = '127.0.0.1';  //localhost
$db = 'b1'; //nom de la base de donnée
$user = 'userdb';
$pass = 'merguez69';
$charset = 'utf8mb4';

$connection_string = "mysql:host=$host; dbname=$db; charset=$charset";

$options = [
  PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false
];

try{
  $pdo = new PDO ($connection_string, $user, $pass, $options); //connexion a la bdd
  $sql = "SELECT id, nom_du_medoc, forme, date_de_peremption, Dose, stock FROM stockmedoc;";  //requette préparer
  $stmt = $pdo->prepare($sql); //appel de la requete preparer
  $success = $stmt->execute(); //execution de la requete preparer
  $result = $stmt->fetchAll();// La méthode fetch() de l'objet $stmt est appelée pour récupérer les résultats de la requête exécutée
                              // La méthode fetch() retourne un tableau associatif qui contient les données de la ligne courante
                              // le résultat est stocké de la variable $result

} catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./CSS/home.css">
    <title>Pharmatruc</title>

    <meta charset="UTF-8" />
</head>


<body>
<nav class="navbar">
    <div class="logo">
      <h3>Pharmatruc</h3>
    </div>
  </nav>

  <section id="content">
    <h1 class="content-header">Inventaire</h1>

<table>  <!-- INTEGRATION TABLEAU-->
  <tr>
    <th>id</th>
    <th>nom_du_medoc</th>
    <th>forme</th>
    <th>date_de_peremption</th>
    <th>Dose</th>
    <th>Stock</th>
    <th>Details</th>
  </tr>
<?php // recuperation des données stocker dans la variable
foreach ($result as $stockmedoc) { //parcour du tableau avec la boucle foreach et as attribue chaque element de $result a $stockmedoc
echo "<tr>";
echo "<td>". $stockmedoc ["id"]. "</td>";
echo "<td>". $stockmedoc ["nom_du_medoc"]. "</td>";
echo "<td>". $stockmedoc ["forme"]. "</td>";
echo "<td>". $stockmedoc ["date_de_peremption"]. "</td>";
echo "<td>". $stockmedoc ["Dose"]. "</td>";
echo "<td>". $stockmedoc ["stock"]. "</td>";
echo "<td><form action='update.php'><input type='hidden' name='id' value='".$stockmedoc["id"]."' /><input type='submit' value='detail' /></form></td>";
echo "</tr>";
}
?>
</table>
</section>

</body>