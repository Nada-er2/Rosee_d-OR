<?php
header("Content-Type: application/json");

// Connexion à la base de données
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "rosée d’or";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer l'ID envoyé via POST
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id'])) {
        $id = $data['id'];

        // Supprimer le produit
        $stmt = $conn->prepare("DELETE FROM favorite WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "ID manquant."]);
    }
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}
?>
