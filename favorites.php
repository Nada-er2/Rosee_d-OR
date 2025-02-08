<?php
// Connexion à la base de données
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "rosée d’or";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les favoris
    $stmt = $conn->prepare("SELECT * FROM favorite");
    $stmt->execute();
    $favorites = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Favoris</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
        }
        .btn-delete {
            background-color: #e74c3c;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }
        .btn-buy {
            background-color: #27ae60;
            color: white;
        }
        .btn-buy:hover {
            background-color: #1e8449;
        }
        h1{
            margin-top: 3%;
            margin-left: 15%;
            font-size: 40px;
            font-family: "Playfair Display, serif";

        }

    </style>
</head>
<body>
<header>
        <ul class="liste_header">
            <!-- <a href="Page_Home.php"><img src="images/freepik-gradient-linear-leaves-perfume-logo-202501072232411U9E.png" alt="Logo" style="width: 100px; height: 100px; padding-top:25px ;"></a> -->
            <li><a href="index.html">HOME</a></li>
            <li><a href="Page_Femme.html">PARFUM FEMME</a></li>
            <li><a href="Page_Homme.html">PARFUM HOMME</a></li>
            <li><a href="Page_Pack.html">COFFRET & PACK</a></li>  
            <li><a href="favorites.php"><img src="images/icon/coeur.png" alt="coeur"></a></li>
            <li><a href="cart.html"><img src="images/icon/panier-dachat-simple.png" alt="panier"></a></li>
        </ul>
    </header>
    <div class="container">
        <h1>Mes Favoris</h1>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($favorites) > 0): ?>
                    <?php foreach ($favorites as $favorite): ?>
                        <tr>
                            <td><img src="<?= htmlspecialchars($favorite['img1']) ?>" alt="<?= htmlspecialchars($favorite['Nom']) ?>" style="width: 80px; height: auto;"></td>
                            <td><?= htmlspecialchars($favorite['Nom']) ?></td>
                            <td><?= htmlspecialchars($favorite['Catégorie']) ?></td>
                            <td><?= htmlspecialchars($favorite['Prix']) ?></td>
                            <td>
                                <button class="btn btn-delete" onclick="deleteFavorite(<?= $favorite['ID'] ?>)">Delete</button>
                                <button class="btn btn-buy" onclick="buyProduct(<?= $favorite['ID_produit'] ?>)">Buy Product</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Aucun produit dans vos favoris.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        function deleteFavorite(id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cet article de vos favoris ?")) {
                fetch("delete_favorite.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ id: id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Produit supprimé des favoris !");
                        window.location.reload(); // Recharge la page
                    } else {
                        alert("Erreur : " + data.message);
                    }
                })
                .catch(error => console.error("Erreur :", error));
            }
        }

        function buyProduct(id) {
            alert("Redirection vers la page d'achat pour le produit ID : " + id);
            // Vous pouvez ici rediriger l'utilisateur vers une page de paiement ou d'achat
        }
    </script>
    

</body>
</html>
