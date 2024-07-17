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
