<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Liste de Parfums</title>
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .parfum-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            text-align: center;
            cursor: pointer;
            animation-duration: 1s;
            animation-name: slidein;
        }
        @keyframes slidein {
            from {
              margin-top: 100%;
              width: 300%;
            }
            to {
              margin-top: 0%;
              width: 100%;
            }
        }
        .parfum-item {
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
            padding: 10px;
            transition: transform 0.3s ease;
        }
        .parfum-item img {
            top: 0;
            left: 0;
            width: 100%;
            height:  100%;
            object-fit: cover;
            transition: opacity 0.3s ease;
        }
        .parfum-item img.default-image {
            opacity: 1;
        }
        .parfum-name {
            font-size: 14px;
            margin: 10px 0 5px;
            color: #1E0101;
        }
        .parfum-prices {
            margin-top: 8px;
        }
        .old-price {
            color: #999;
            text-decoration: line-through;
            font-size: 14px;
            margin-right: 8px;
        }
        .new-price {
            color: #1E0101 ;
            font-size: 20px;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination button {
            background-color: transparent;
            color: #b73266;
            border: 1px solid #d4af37;
            border-radius: 4px;
            padding: 10px 15px;
            margin: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .pagination button:hover {
            background: linear-gradient(18deg, #fce4ec, #f8efe9); /* Dégradé rose clair et beige */
        }
        .pagination button.active {
            background: linear-gradient(18deg, #fce4ec, #f8efe9); /* Dégradé rose clair et beige */
            font-weight: bold;
        }
        /* Conteneur des boutons à droite de l'image */
        .product-buttons {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            flex-direction: column; 
            gap: 10px; 
            z-index: 10;
        }
        /* Boutons (Favoris et Panier) */
        .product-buttons button {
           background-color: #1E0101;
           border: none;
           width: 40px;
           height: 40px;
           border-radius: 50%;
           display: flex;
           align-items: center;
           justify-content: center;
           cursor: pointer;
           transition: background-color 0.3s ease; 
        }
        /* Icônes dans les boutons */
        .product-buttons button img {
           width: 20px;
           height: 20px;
           filter: invert(1); /* Rend l'icône blanche */
        }
        .product-buttons button:hover {
            background-color: #d4af37; /* Couleur dorée */
        }
        .parfum-item {
            position: relative;
            overflow: hidden;
            padding: 10px;
        }
        .default-image {
            display: block;
            width: 100%;
            height: auto;
        }    
    </style>
</head>
<body>
    <nav>
        <p>LIVRAISON GRATUITE PARTOUT AU MAROC || 2 Achetes = 3eme Offert a votre choix</p>
        <p>LIVRAISON GRATUITE PARTOUT AU MAROC || 2 Achetes = 3eme Offert a votre choix</p>
        <p>LIVRAISON GRATUITE PARTOUT AU MAROC || 2 Achetes = 3eme Offert a votre choix</p>
        <p>LIVRAISON GRATUITE PARTOUT AU MAROC || 2 Achetes = 3eme Offert a votre choix</p>
        <p>LIVRAISON GRATUITE PARTOUT AU MAROC || 2 Achetes = 3eme Offert a votre choix</p>
    </nav>
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
    <div class="container">
        <h1>PARFUM HOMME</h1>
        <div id="parfumGrid" class="parfum-grid">
            <!-- Les éléments de parfums seront insérés ici par JavaScript -->
        </div>
        <div class="pagination" id="pagination">
            <!-- Les boutons de pagination seront insérés ici par JavaScript -->
        </div>
    </div>

    <script>
        // Données des parfums
        const parfums = [
            { id:1,name: "Coffret Sauvage 3X 30ml", img1: "images/pack/Coffret Sauvage 30ML x 3.webp", oldPrice: "1,399.00 Dh", newPrice: "699.00 Dh"  },
            { id:2,name: "COFFRET DlOR 30ML x 3", img1: "images/pack/COFFRET DlOR 30ML x 3.webp" ,oldPrice: "1,399.00 Dh", newPrice: "699.00 Dh" },
            { id:3,name: "COFFRET Dior Gucci Bloom x 3 (120ML)", img1: "images/pack/COFFRET Dior Gucci Bloom x 3 (120ML)1.webp" ,oldPrice: "1,400.00 Dh", newPrice: "699.00 Dh" },
            { id:4,name: "COFFRET Hugo boss", img1: "images/pack/COFFRET Hugo boss.webp", oldPrice: "1,290.00 Dh", newPrice: "699.00 Dh" },
            { id:5,name: "COFFRET TOMFORD 3 X 30ML ( 90ML )", img1: "images/pack/COFFRET TOMFORD 3 X 30ML ( 90ML ).webp", oldPrice: "1,728.00 Dh", newPrice: "699.00 Dh" },
            { id:6,name: "Carolina Herrera 212 Mens Gift set - 3 x 30ml", img1: "images/pack/Carolina Herrera 212 Mens Gift set - 3 x 30ml.webp",oldPrice: "1,800.00 Dh", newPrice: "699.00 Dh" },
            { id:7,name: "Aventus Creed Gift Set 3 in 1 Bundle 30ml For Men", img1: "images/pack/Aventus Creed Gift Set 3 in 1 Bundle 30ml For Men.webp", oldPrice: "1,799.00 Dh", newPrice: "699.00 Dh" },
            { id:8,name: "CHANEL BLEU DE CHANEL 3IN1 SET (3*30ML)", img1: "images/pack/CHANEL BLEU DE CHANEL 3IN1 SET (330ML).jpg", oldPrice: "1,993.00 Dh", newPrice: "699.00 Dh" },
        ];

        const itemsPerPage = 9;
        let currentPage = 1;
        function renderParfums(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const pageParfums = parfums.slice(start, end);
            const parfumGrid = document.getElementById("parfumGrid");
                 parfumGrid.innerHTML = "";
                 pageParfums.forEach((parfum, index) => {
            const parfumItem = document.createElement("div");
                 parfumItem.className = "parfum-item";
                 parfumItem.innerHTML = `
                <div style="position: relative;">
                 <!-- Conteneur des boutons -->
                <div class="product-buttons">
                    <button class="btn-favorite" onclick="addToFavorites(${start + index})">
                        <img src="images/icon/coeur.png" alt="Favoris" />
                    </button>
                    <button class="btn-cart" onclick="addToCart(${index})">
                            <img src="images/icon/panier-dachat-simple.png" alt="Panier" />
                        </button>
                </div>
                <img src="${parfum.img1}" alt="${parfum.name}" class="default-image">
            </div>
            <div class="parfum-name">${parfum.name}</div>
            <div class="parfum-prices">
                <span class="old-price">${parfum.oldPrice}</span>
                <span class="new-price">${parfum.newPrice}</span>
            </div>
        `;
        parfumGrid.appendChild(parfumItem);
    });
}
        function renderPagination() {
            const pageCount = Math.ceil(parfums.length / itemsPerPage);
            const pagination = document.getElementById("pagination");
            pagination.innerHTML = "";

            for (let i = 1; i <= pageCount; i++) {
                const button = document.createElement("button");
                button.textContent = i;
                button.className = i === currentPage ? "active" : "";
                button.addEventListener("click", () => {
                    currentPage = i;
                    renderParfums(currentPage);
                    renderPagination();
                });
                pagination.appendChild(button);
            }
        }
        renderParfums(currentPage);
        renderPagination();
        
        function addToFavorites(index) {
            const parfum = parfums[index];
            // Préparer les données
            const formData = new FormData();
            formData.append("id", parfum.id); // ID unique
            formData.append("name", parfum.name);
            formData.append("category", "Pack"); // Catégorie
            formData.append("price", parfum.newPrice); // Prix
            formData.append("img1", parfum.img1); // Image principale
            // Envoi des données au serveur
            fetch("add_to_favorites.php", {
                method: "POST",
               body: formData
            })
            .then(response => response.json())
            .then(data => {
            if (data.success) {
                console.log("Produit ajouté aux favoris !");
            } else {
                alert(data.message); // Message renvoyé par le serveur
            }
       })
       }
        function addToCart(productIndex) {
            const product = parfums[productIndex]; // Récupérer le produit par index
            const cart = JSON.parse(localStorage.getItem("cart")) || []; // Récupérer le panier depuis localStorage
            const existingProduct = cart.find(p => p.id === product.id);
            if (existingProduct) {
                existingProduct.quantity++;
            } else {
                cart.push({ ...product, quantity: 1 });
            }
            localStorage.setItem("cart", JSON.stringify(cart)); // Sauvegarder le panier dans localStorage
            alert("Produit ajouté au panier !");
        }
        // Afficher les produits au chargement de la page
        displayProducts();
    </script>
</body>
</html>