<?php
// Connexion à la base de données
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "rosée d’or";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification des données reçues
    if (isset($_POST['id'], $_POST['name'], $_POST['category'], $_POST['price'], $_POST['img1'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $img1 = $_POST['img1'];

        // Assainir et valider les données
        if (empty($id) || empty($name) || empty($category) || empty($price) || empty($img1)) {
            echo json_encode(["success" => false, "message" => "Données incomplètes."]);
            exit;
        }

        // Début de la transaction
        $conn->beginTransaction();

        // Vérifier si l'ID avec la même catégorie existe déjà dans la table
        $stmt = $conn->prepare("SELECT COUNT(*) FROM favorite WHERE ID_produit = :id AND Catégorie = :category");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {
            // Insérer le produit si l'ID avec cette catégorie n'existe pas
            $stmt = $conn->prepare("INSERT INTO favorite (ID_produit, Catégorie, Nom, Prix, img1) VALUES (:id, :category, :name, :price, :img1)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':img1', $img1);
            $stmt->execute();

            // Validation de la transaction
            $conn->commit();

            echo json_encode(["success" => true, "message" => "Produit ajouté aux favoris."]);
        } else {
            // Si le produit avec la même catégorie existe déjà
            $conn->rollBack();
            echo json_encode(["success" => false, "message" => "Ce produit est déjà dans les favoris pour cette catégorie."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Données manquantes."]);
    }
} catch (PDOException $e) {
    // Si une erreur survient, on annule la transaction
    $conn->rollBack();
    echo json_encode(["success" => false, "message" => "Erreur : " . $e->getMessage()]);
}
?>
