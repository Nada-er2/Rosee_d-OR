<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "rosée d’or";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}
echo "Connexion réussie";

// Fermer la connexion
$conn->close();
?>
