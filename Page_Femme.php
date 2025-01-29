<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Liste de Parfums</title>
    <style>
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
           grid-template-columns: repeat(4, 1fr);
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
        .parfum-item:hover {
            transform: scale(1.05);
        }
        .parfum-item img {
            top: 0;
            left: 0;
            width: 100%;
            height:  100%;
            object-fit: cover;
            transition: opacity 0.3s ease;
        }
        .parfum-item:hover img.hover-image {
            opacity: 1;
        }
        .parfum-item img.default-image {
            opacity: 1;
        }
        .parfum-item img.hover-image {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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
            font-size: 15px;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination button {
            background-color: transparent;
            color: #b73266;
            border: 2px solid #d4af37;
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
        #searchContainer {
             position: relative; 
        }
        #searchIcon {
            cursor: pointer;
        }
        #searchInput {
            position: absolute;
            top: 100px; 
            left: 0;
            width: 200px; 
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            z-index: 10;
            display: none; 
            background-color: white; 
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: scale(0.95); 
            opacity: 0; 
        }
        #searchInput.show {
            transform: scale(1); /* Taille normale */
            opacity: 1; /* Visible */
        }

        .product-buttons {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            flex-direction: column; 
            gap: 10px; /* Ajoute un espace entre les boutons */
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
            filter: invert(1); 
        }
        /* Effet au survol des boutons */
        .product-buttons button:hover {
            background-color: #d4af37; /* Couleur dorée */
        }
        /* Conteneur produit (évite le chevauchement des boutons sur l'image) */
        .parfum-item {
            position: relative;
            overflow: hidden;
            padding: 10px;
        }
       /* Pour l'image par défaut */
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
            <li><a href="index.html">HOME</a></li>
            <li><a href="Page_Femme.php">PARFUM FEMME</a></li>
            <li><a href="Page_Homme.php">PARFUM HOMME</a></li>
            <li><a href="Page_Pack.php">COFFRET & PACK</a></li>
            <li id="searchContainer">
                <a href="#" id="searchIcon">
                    <img src="images/icon/chercher.png" alt="chercher" style="cursor: pointer;">
                </a>
                <input type="text" id="searchInput" placeholder="Rechercher un produit..." onkeyup="searchProducts()">
            </li>            
            <li><a href="favorites.php"><img src="images/icon/coeur.png" alt="coeur"></a></li>
            <li><a href="cart.html"><img src="images/icon/panier-dachat-simple.png" alt="panier"></a></li>
        </ul>
    </header>
    <div class="container">
        <h1>PARFUM FEMME</h1>
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
            { id: 1,name: "YVES SAINT LAURENT Libre - Eau de Parfum 90ML", img1: "images/femme/YVES SAINT LAURENT Libre.webp", img2: "images/femme/YVES SAINT LAURENT Libre1.webp",oldPrice: "734.00 Dh", newPrice: "549.00 Dh"  },
            { id: 2,name: "CHANEL COCO MADEMOISELLE Eau De Parfum 100ML", img1: "images/femme/CHANEL COCO MADEMOISELLE.webp", img2: "images/femme/CHANEL COCO MADEMOISELLE1.webp" ,oldPrice: "864.00 Dh", newPrice: "499.00 Dh" },
            { id: 3,name: "DIOR Miss Dior - Eau de Parfum 100ML", img1: "images/femme/DIOR Miss Dior.webp", img2: "images/femme/DIOR Miss Dior1.webp" ,oldPrice: "642.00 Dh", newPrice: "499.00 Dh" },
            { id: 4,name: "JEAN PAUL GAULTIER So Scandal ! - Eau de Parfum 80ML", img1: "images/femme/JEAN PAUL GAULTIER So Scandal.webp", img2: "images/femme/JEAN PAUL GAULTIER So Scandal 1.webp" ,oldPrice: "786.00 Dh", newPrice: "549.00 Dh" },
            { id: 5,name: "LA PETITE ROBE NOIRE 100ML", img1: "images/femme/LA PETITE ROBE NOIRE.webp", img2: "images/femme/LA PETITE ROBE NOIRE1.webp" ,oldPrice: "1,100.00 Dh", newPrice: "499.00 Dh" },
            { id: 6,name: "ARMANI SI PASSIONE - Eau de Parfum 100ML", img1: "images/femme/ARMANI SI PASSIONE.webp", img2: "images/femme/ARMANI SI PASSIONE1.webp" ,oldPrice: "982.00 Dh", newPrice: "499.00 Dh" },
            { id: 7,name: "DIOR J'adore - Eau de parfum 100ML", img1: "images/femme/DIOR J'adore.webp", img2: "images/femme/DIOR J'adore1.webp" ,oldPrice: "1,274.00 Dh", newPrice: "549.00 Dh" },
            { id: 8,name: "LANCÔME Idôle - Eau de Parfum 75ML", img1: "images/femme/LANCÔME Idôle.webp", img2: "images/femme/LANCÔME Idôle1.webp" ,oldPrice: "864.00 Dh", newPrice: "499.00 Dh" },
            { id: 9,name: "BACCARAT ROUGE 540", img1: "images/femme/BACCARAT ROUGE 540.webp", img2: "images/femme/BACCARAT ROUGE 540-1.webp" ,oldPrice: "2,400.00 Dh", newPrice: "549.00 Dh" },
            { id: 10,name: "GUCCI Bloom - Eau de Parfum 100ML", img1: "images/femme/GUCCI Bloom.webp", img2: "images/femme/GUCCI Bloom1.webp" ,oldPrice: "786.00 Dh", newPrice: "499.00 Dh" },
            { id: 11,name: "Crystal Noir - Eau de Parfum", img1: "images/femme/Crystal Noir.webp", img2: "images/femme/Crystal Noir1.webp" ,oldPrice: "1,283.00 DH", newPrice: "549.00 DH" },
            { id: 12,name: "YVES SAINT LAURENT Black Opium - Eau de Parfum 90ML", img1: "images/femme/YVES SAINT LAURENT Black Opium.webp", img2: "images/femme/YVES SAINT LAURENT Black Opium1.webp" ,oldPrice: "863.00 DH", newPrice: "499.00 DH" },
            { id: 13,name: "LANCÔME La vie est belle - Eau de Parfum 75ML", img1: "images/femme/LANCÔME La vie est belle.webp", img2: "images/femme/LANCÔME La vie est belle1.webp" ,oldPrice: "1,010.00 Dh", newPrice: "499.00 Dh"  },
            { id: 14,name: "CAROLINA HERRERA Good Girl - Eau de parfum 80ML", img1: "images/femme/CAROLINA HERRERA Good Girl.webp", img2: "images/femme/CAROLINA HERRERA Good Girl1.webp" ,oldPrice: "1,010.00 Dh", newPrice: "499.00 Dh" },
            { id: 15,name: "For Her Fleur Musc Eau de Parfum 100Ml", img1: "images/femme/For Her Fleur Musc.webp", img2: "images/femme/For Her Fleur Musc 1.webp" ,oldPrice: "1,829.00 Dh", newPrice: "699.00 Dh" },
            { id: 16,name: "PACO RABANNE Olympéa - Eau de Parfum 80ML", img1: "images/femme/PACO RABANNE Olympéa.webp", img2: "images/femme/PACO RABANNE Olympéa1.webp" ,oldPrice: "1,090.00 Dh", newPrice: "459.00 Dh" },
            { id: 17,name: "HYPNOTIC POISON EAU DE PARFUM", img1: "images/femme/HYPNOTIC POISON.webp", img2: "images/femme/HYPNOTIC POISON1.webp" ,oldPrice: "1,399.00 Dh", newPrice: "599.00 Dh" },
            { id: 18,name: "BOSS THE SCENT FOR HER EAU DE PARFUM 100ML", img1: "images/femme/BOSS THE SCENT FOR HER.webp", img2: "images/femme/BOSS THE SCENT FOR HER1.webp" ,oldPrice: "1,990.00 Dh", newPrice: "499.00 Dh" },
            { id: 19,name: "DOLCE & GABBANA The One - Eau de Parfum 75ML", img1: "images/femme/DOLCE & GABBANA The One.webp", img2: "images/femme/DOLCE & GABBANA The One1.webp" ,oldPrice: "1,367.00 Dh", newPrice: "549.00 Dh" },
            { id: 20,name: "TOMFORD Bitter Peach eau de parfum 100ml", img1: "images/femme/TOMFORD Bitter Peach.webp", img2: "images/femme/TOMFORD Bitter Peach1.webp" ,oldPrice: "2,859.00 Dh", newPrice: "649.00 Dh" },
            { id: 21,name: "BECAUSE IT'S YOU 100ML", img1: "images/femme/BECAUSE IT'S YOU.webp", img2: "images/femme/BECAUSE IT'S YOU1.webp" ,oldPrice: "1,100.00 Dh", newPrice: "449.00 Dh" },
            { id: 22,name: "DIOR JOY de Dior - Eau de parfum 90ML", img1: "images/femme/DIOR JOY de Dior.webp", img2: "images/femme/DIOR JOY de Dior1.webp" ,oldPrice: "898.00 Dh", newPrice: "449.00 Dh" },
            { id: 23,name: "Dolce & Gabbana Intense Eau de Parfum pour Femme 50ml", img1: "images/femme/Dolce & Gabbana Intense.webp", img2: "images/femme/Dolce & Gabbana Intense1.webp" ,oldPrice: "1,200.00 Dh", newPrice: "549.00 Dh" },
            { id: 24,name: "GIVENCHY L'Interdit - Eau de Parfum 80ML", img1: "images/femme/GIVENCHY L'Interdit.webp", img2: "images/femme/GIVENCHY L'Interdit1.webp" ,oldPrice: "1,200.00 Dh", newPrice: "599.00 Dh" },
            { id: 25,name: "LUCKY", img1: "images/femme/LUCKY.webp", img2: "images/femme/LUCKY1.webp" ,oldPrice: "2,983.00 Dh", newPrice: "549.00 Dh" },
            { id: 26,name: "ARMANI My Way - Eau de Parfum 90ML", img1: "images/femme/ARMANI My Way.webp", img2: "images/femme/ARMANI My Way1.webp" ,oldPrice: "986.00 Dh", newPrice: "549.00 Dh" },
            { id: 27,name: "GABRIELLE CHANEL 100ml", img1: "images/femme/GABRIELLE CHANEL.webp", img2: "images/femme/GABRIELLE CHANEL 1.webp" ,oldPrice: "2,689.00 Dh", newPrice: "499.00 Dh" },
            { id: 28,name: "GUCCI Bloom Ambrosia Di Fiori Eau De Parfum Intense", img1: "images/femme/GUCCI Bloom Ambrosia Di Fiori.webp", img2: "images/femme/GUCCI Bloom Ambrosia Di Fiori1.webp" ,oldPrice: "1,265.00 Dh", newPrice: "499.00 Dh" },
            { id: 29,name: "GUCCI Bloom - Eau de Toilette 100ML", img1: "images/femme/GUCCI Bloomm.webp", img2: "images/femme/GUCCI Bloomm1.webp" ,oldPrice: "853.00 Dh", newPrice: "499.00 Dh" },
            { id: 30,name: "VERSACE Dylan Blue Femme", img1: "images/femme/VERSACE Dylan Blue Femme.webp", img2: "images/femme/VERSACE Dylan Blue Femme1.webp" ,oldPrice: "928.00 Dh", newPrice: "499.00 Dh" },
            { id: 31,name: "Rose Prick - Eau de Parfum", img1: "images/femme/Rose Prick.webp", img2: "images/femme/Rose Prick1.webp" ,oldPrice: "1,456.00 Dh", newPrice: "549.00 Dh" },
            { id: 32,name: "YVES SAINT LAURENT CINÉMA Eau de Parfum", img1: "images/femme/cinema_edp_f_1024x1024_2x_4e5ca53d-f0eb-4dd2-9026-9792eebfc454.jpg", img2: "images/femme/cinema_edp_p_1024x1024_2x_7bb2fd58-a1b3-483e-8885-073a12ce69a2.webp" ,oldPrice: "1,298.00 Dh", newPrice: "449.00 Dh" },
            { id: 33,name: "Gucci Mémoire D'une Odeur, 100ml Eau De Parfum", img1: "images/femme/Gucci Mémoire D'une Odeur.webp", img2: "images/femme/Gucci Mémoire D'une Odeur1.webp" ,oldPrice: "1,265.00 Dh", newPrice: "599.00 Dh" },
            { id: 34,name: "My Burberry Black - Parfum", img1: "images/femme/My Burberry Black.webp", img2: "images/femme/My Burberry Black1.webp" ,oldPrice: "1,338.00 Dh", newPrice: "599.00 Dh" },
            { id: 35,name: "YVES SAINT LAURENT Mon Paris - Eau de Parfum 90ML", img1: "images/femme/YVES SAINT LAURENT Mon Paris.webp", img2: "images/femme/YVES SAINT LAURENT Mon Paris 1.webp" ,oldPrice: "789.00 Dh", newPrice: "499.00 Dh" }
        ];
        
        const itemsPerPage = 12;
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
                <img src="${parfum.img2}" alt="${parfum.name}" class="hover-image">
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
            formData.append("category", "Parfum Homme"); // Catégorie
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
    <script src="scriptrecherche.js"></script>
    <?php
include('page_connexion.php');
?>
</body>
</html>