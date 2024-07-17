* 1 index.php
L'index.php est le formulaire 
![alt text](image.png)
le formulaire n est encore connecter à aucune base de donnée
le CSS est dans le fichier style.css qui est linker par ce code 
```html
<head>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
```

le formulaire utlise pour action le fichier action.php
```php
<?php
// appel au fichier home.php lorsque l'on clique sur entrer sur le index.php
    header("Location: http://localhost/b1/projet/home.php");
```
comme la table d'utilisateur n'a pas encore été crée ce fichier n'a que pour seul action d'envoyer vers le lien définis

** 2 home.php
La page home.php est la page d'accueil et 
![alt text](image-1.png)
pour commencer le php permet à la page de se connecter a la base de donnée bdd_pharamatruc
```php
$host = '127.0.0.1';  //localhost
$db = 'bdd_pharamatruc'; //nom de la base de donnée
$user = 'root';
$pass = '';
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
```
la bar de navigation est gerer par ce code html
```html
<nav class="navbar">
    <div class="logo">
      <h3>Pharmatruc</h3>
    </div>
  </nav>

  <section id="content">
    <h1 class="content-header">Inventaire</h1>
```
le css est géré par le fichier home.css dans le document 
le tableau au milieu de la page récupere les données de la table stockmedoc
```html
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
foreach ($result as $stockmedoc) { 
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
```
Parcour du tableau avec la boucle foreach et as attribue chaque element de $result a $stockmedoc

*** update.php
le detail des medicament est visible en cliquant sur le bouton "detail" celui-ci renvoit vers le fichier update.php
```php
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=bdd_pharamatruc', 'root', '');  // connexion a la base de donnée
     // 
     if (isset($_GET["id"])) {      //La fonction isset() vérifie si la variable $_GET["id"] est définie et n'est pas NULL.
        $id = $_GET["id"];      /* Si la variable $_GET["id"] est définie, sa valeur est assignée à la variable $id. 
                                 * La superglobale $_GET contient les données envoyées par la méthode GET dansl'URL 
                                */
        $sql = "SELECT * FROM stockmedoc WHERE id = :id";   // requete sql preparer et le :id est ce qui est remplacer a l'execution              
        $stmt = $pdo->prepare($sql);    // stmt est une variable qui contient une requete preparer (prepare statement)
        $stmt->execute(['id' => $id]);  // execution de la requete preparer de l objet stmt le tableau ['id' => $id] est passer en parametre la methode execute() 
                                        // Dans ce cas, la clé id est liée à la valeur de la variable $id
        $targetedStock = $stmt->fetch();    // La méthode fetch() de l'objet $stmt est appelée pour récupérer les résultats de la requête exécutée
                                            // La méthode fetch() retourne un tableau associatif qui contient les données de la ligne courante
                                            // le résultat est stocké de la variable $targetStock
     }
?>
```
```html
<!-- input en php  la valeur est egale a la concatenation avec '.' segmenter en 3 morceaux: 
 la premiere contient l input en html 
 la deuxieme contient le tableau associatif contenant la variables entre [""]
 la troisieme contient
 -->
<form action="home.php" method="POST">
    <?php echo ' <input type="hidden" name="id" value="' . $targetedStock["id"] . ' ">' ?>  
    <?php echo ' <input name="nom" value="' . $targetedStock["nom_du_medoc"] . ' ">' ?>
    <p>Forme du medicament<?php echo ' <input name="forme" value="' . $targetedStock["forme"] .' ">'?></p>
    <p>Stock<?php echo ' <input name="stock" value="' . $targetedStock["stock"] . ' ">' ?></p>
    <input type="submit" value="Valider">
    </form>
```