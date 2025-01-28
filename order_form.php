<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de commande</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General styling for the body */
        body {
            font-family: Arial, sans-serif;
            color: #fff; 
            margin: 0;
            padding: 0;
        }
        form {
            background-color: #fff;
            padding: 30px;
            max-width: 500px;
            margin: 50px auto;
            border-radius: 10px;
            border: 2px solid #1E0101; 
        }
        h2 {
            color: #1E0101; 
            text-align: center;
            margin-bottom: 20px;
        }
        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="text"], input[type="email"], textarea {
            background-color: #f9f9f9;
        }
        button {
            background-color: #D4AF37; 
            color: #1E0101;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #B38A2A; 
        }
        input::placeholder, textarea::placeholder {
            color: #8e8e8e;
        }
        input:focus, textarea:focus {
            border-color: #D4AF37; 
            outline-color: #D4AF37; 
        }
        button:focus {
            border: 2px solid #D4AF37; 
        }
    </style>
</head>
<body>
<header>
        <ul class="liste_header">
            <!-- <a href="Page_Home.php"><img src="images/freepik-gradient-linear-leaves-perfume-logo-202501072232411U9E.png" alt="Logo" style="width: 100px; height: 100px; padding-top:25px ;"></a> -->
            <li><a href="Page_Home.php">HOME</a></li>
            <li><a href="Page_Femme.php">PARFUM FEMME</a></li>
            <li><a href="Page_Homme.php">PARFUM HOMME</a></li>
            <li><a href="Page_Pack.php">COFFRET & PACK</a></li>
            <li><a href="favorites.php"><img src="images/icon/coeur.png" alt="coeur"></a></li>
            <li><a href="cart.html"><img src="images/icon/panier-dachat-simple.png" alt="panier"></a></li>
        </ul>
    </header>
    <form method="POST">
        <h2>Informations personnelles</h2>
        <input type="text" name="name" placeholder="Nom complet" required>
        <input type="email" name="email" placeholder="Adresse e-mail" required>
        <input type="text" name="phone" placeholder="Téléphone" required>
        <textarea name="address" placeholder="Adresse complète" required></textarea>
        <input type="hidden" name="cartData" value="<?php echo isset($_POST['cartData']) ? htmlspecialchars($_POST['cartData']) : ''; ?>">
        <button type="submit" name="submit">Confirmer la commande</button>
    </form>
</body>
</html>
<?php
    // Activer le mode debug pour détecter les erreurs
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {                                          
        $cartData = $_POST['cartData'] ?? '[]';   
        $cart     = json_decode($cartData, true); 

        // Vérifier si les informations utilisateur sont bien envoyées
        if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'])) {
            // Récupérer les informations utilisateur
            $name    = trim($_POST['name']);
            $email   = trim($_POST['email']);
            $phone   = trim($_POST['phone']);
            $address = trim($_POST['address']);

            // Connexion à la base de données
            $servername = "localhost:3308";
            $username   = "root";
            $password   = "";
            $dbname     = "rosée d’or"; 

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Insérer les données utilisateur
                $stmt = $conn->prepare("INSERT INTO users (name, email, phone, address) VALUES (?, ?, ?, ?)");
                $stmt->execute([$name, $email, $phone, $address]);
                $userId = $conn->lastInsertId(); // Récupérer l'ID de l'utilisateur inséré

                // Calculer le total du panier
                $totalPrice = 0;
                if (! empty($cart)) {
                    foreach ($cart as $item) {
                        $totalPrice += $item['quantity'] * $item['newPrice']; 
                        $stmt = $conn->prepare("INSERT INTO orders (user_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
                        $stmt->execute([$userId, $item['name'], $item['quantity'], $item['newPrice']]);
                    }
                }

                // Mettre à jour le totalPrice dans la table users
                $stmt = $conn->prepare("UPDATE users SET totalPrice = ? WHERE id = ?");
                $stmt->execute([$totalPrice, $userId]);

                echo "<p>Commande confirmée et enregistrée avec succès !</p>";
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        } else {
            echo "<p>Veuillez remplir toutes les informations utilisateur.</p>";
        }
    }
?>


