<?php
// Connexion à la base de données
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "rosée d’or";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données envoyées
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['action'], $data['userId'], $data['parfumId'])) {
        $action = $data['action'];
        $userId = $data['userId'];
        $parfumId = $data['parfumId'];

        if ($action == "add") {
            // Ajouter aux favoris
            $stmt = $conn->prepare("INSERT INTO favorite (ID_utilisateur, ID_produit) VALUES (:userId, :parfumId)");
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':parfumId', $parfumId);
            $stmt->execute();
            echo json_encode(["success" => true]);
        } elseif ($action == "remove") {
            // Supprimer des favoris
            $stmt = $conn->prepare("DELETE FROM favorite WHERE ID_utilisateur = :userId AND ID_produit = :parfumId");
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':parfumId', $parfumId);
            $stmt->execute();
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Action inconnue."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Données manquantes."]);
    }
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
?>
