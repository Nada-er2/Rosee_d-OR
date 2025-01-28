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
            gap: 10px; 
            z-index: 10;
        }
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
            transition: background-color 0.3s ease, filter 0.3s ease;
        }
        .product-buttons button img {
            width: 20px;
            height: 20px;
            filter: invert(72%) sepia(55%) saturate(3000%) hue-rotate(12deg) brightness(90%) contrast(88%); /* Icône dorée */
            transition: filter 0.3s ease;
        }
        .product-buttons button:hover {
            background-color: #d4af37; /* Fond doré au survol */
        }
        .product-buttons button:hover img {
            content: url('images/icon/coeur apr.png'); /* Remplace l'icône par une autre */
            filter: none; /* Supprime les filtres d'effet de couleur */
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
            { id: 1,name: "Sauvage - Eau de parfum 100ml", img1: "images/homme/Sauvage.webp", img2: "images/homme/Sauvage1.webp",oldPrice: "1,199.00 Dh", newPrice: "499.00 Dh"  },
            { id: 2,name: "BLEU DE CHANEL Eau De Parfum 100ML", img1: "images/homme/bleu-de-chanel.webp", img2: "images/homme/bleu-chanel.webp" ,oldPrice: "899.00 Dh", newPrice: "499.00 Dh" },
            { id: 3,name: "VERSACE Eros Eau de parfum", img1: "images/homme/Versace Eros.webp", img2: "images/homme/Versace Eros 1.webp" ,oldPrice: "1,300.00 Dh", newPrice: "499.00 Dh" },
            { id: 4,name: "The One For Men Intense - Eau de Parfum", img1: "images/homme/The One For Men Intense.webp", img2: "images/homme/The One For Men Intense1.webp" ,oldPrice: "1,855.00 Dh", newPrice: "549.00 Dh" },
            { id: 5,name: "TOM FORD TOBACCO OUD Eau De Parfum 100ml", img1: "images/homme/Oud Wood.webp", img2: "images/homme/Oud Wood1.webp" ,oldPrice: "2,930.00 Dh", newPrice: "499.00 Dh" },
            { id: 6,name: "ARMANI Acqua Di Gio Absolu - Eau de Parfum 100ML", img1: "images/homme/ARMANI Acqua Di Gio Absolu.webp", img2: "images/homme/ARMANI Acqua Di Gio Absolu1.webp" ,oldPrice: "835.00 Dh", newPrice: "499.00 Dh" },
            { id: 7,name: "DIOR Parfum Fahrenheit - Eau de Parfum 75ML", img1: "images/homme/DIOR Parfum Fahrenheit.webp", img2: "images/homme/DIOR Parfum Fahrenheit1.webp" ,oldPrice: "1,200.00 Dh", newPrice: "549.00 Dh" },
            { id: 8,name: "PACO RABANNE Pure XS", img1: "images/homme/PACO RABANNE Pure XS.webp", img2: "images/homme/PACO RABANNE Pure XS1.webp" ,oldPrice: "940.00 Dh", newPrice: "499.00 Dh" },
            { id: 9,name: "TOM FORD Black Orchid - Eau De Parfum 100ML", img1: "images/homme/TOM FORD Black Orchid.webp", img2: "images/homme/TOM FORD Black Orchid1.webp" ,oldPrice: "1,890.00 Dh", newPrice: "549.00 Dh" },
            { id: 10,name: "Dolce & Gabbana Light Blue Sun Pour Homme Edt 125 Ml", img1: "images/homme/DOLCE & GABBANA LIGHT BLUE EAU.webp", img2: "images/homme/DOLCE & GABBANA LIGHT BLUE EAU1.webp" ,oldPrice: "1,890.00 Dh", newPrice: "499.00 Dh" },
            { id: 11,name: "DIOR Homme - 100ML", img1: "images/homme/DIOR Homme.webp", img2: "images/homme/DIOR Homme1.webp" ,oldPrice: "893.00 DH", newPrice: "499.00 DH" },
            { id: 12,name: "CHANEL ALLURE HOMME SPORT 100ML", img1: "images/homme/CHANEL-ALLURE-HOMME.webp", img2: "images/homme/CHANEL_ALLURE_HOMME_SPORT.webp" ,oldPrice: "895.00 DH", newPrice: "499.00 DH" },
            { id: 13,name: "Armani Code - Parfum", img1: "images/homme/ARMANI-CODE.webp", img2: "images/homme/ARMANI-CODE1.webp" ,oldPrice: "1,299.00 DH", newPrice: "549.00 DH" },
            { id: 14,name: "HERMÈS Terre d'Hermès - 100ML", img1: "images/homme/HERMES TERRE D'HERMES.webp", img2: "images/homme/HERMES TERRE D'HERMES1.webp" ,oldPrice: "965.00 DH", newPrice: "549.00 DH" },
            { id: 15,name: "GUERLAINL'HOMME IDEAL EAU DE PARFUM 100ML", img1: "images/homme/GUERLAINL'HOMME1.webp", img2: "images/homme/GUERLAINL'HOMME.webp" ,oldPrice: "900.00 DH", newPrice: "549.00 DH" },
            { id: 16,name: "Phantom - Eau de Toilette", img1: "images/homme/PHANTOM.webp", img2: "images/homme/PHANTOM1.webp" ,oldPrice: "799.00 DH", newPrice: "549.00 DH" },
            { id: 17,name: "K - Eau de Toilette 100ml", img1: "images/homme/K.webp", img2: "images/homme/K1.webp" ,oldPrice: "1,378.00 DH", newPrice: "499.00 DH" },
            { id: 18,name: "TOM FORD Ombre Leather - Eau de Parfum 100ML", img1: "images/homme/TOM FORD OMBRE LEATHER.webp", img2: "images/homme/TOM FORD OMBRE LEATHER1.jpg" ,oldPrice: "1,599.00 DH", newPrice: "549.00 DH" },
            { id: 19,name: "ARMANI Stronger With You - 100ML", img1: "images/homme/ARMANI.webp", img2: "images/homme/ARMANI1.jpg" ,oldPrice: "1,895.00 DH", newPrice: "799.00 DH" },
            { id: 20,name: "Bois du Portugal Creed 120Ml", img1: "images/homme/Bois du Portugal.webp", img2: "images/homme/Bois du Portugal1.webp" ,oldPrice: "3,928.00 DH", newPrice: "549.00 DH" },
            { id: 21,name: "Oud Wood - Eau de Parfum 100ml", img1: "images/homme/Oud Wood.webp", img2: "images/homme/Oud Wood1.webp" ,oldPrice: "2,100.00 DH", newPrice: "549.00 DH" },
            { id: 22,name: "Le Male Le Parfum Intense 125ml", img1: "images/homme/LE MALE AVIATOR.webp", img2: "images/homme/LE MALE AVIATOR1.webp" ,oldPrice: "938.00 DH", newPrice: "899.00 DH" },
            { id: 23,name: "FAHRENHEIT EAU DE PARFUM 100ml", img1: "images/homme/FAHRENHEIT.webp", img2: "images/homme/FAHRENHEIT1.webp" ,oldPrice: "918.00 DH", newPrice: "499.00 DH" },
            { id: 24,name: "LACOSTEL.12.12 Blanc - Eau de Parfum", img1: "images/homme/LACOSTEL.12.12 Blanc.webp", img2: "images/homme/LACOSTEL.12.12 Blanc 1.webp" ,oldPrice: "726.00 DH", newPrice: "499.00 DH" },
            { id: 25,name: "DIOR Homme Sport 100ML", img1: "images/homme/DIOR Homme Sport.webp", img2: "images/homme/DIOR Homme Sport1.webp" ,oldPrice: "1,755.00 DH", newPrice: "439.00 DH" },
            { id: 26,name: "DOLCE & GABBANA The One For Men 100ML", img1: "images/homme/DOLCE & GABBANA The One For Men.webp", img2: "images/homme/DOLCE & GABBANA The One For Men1.webp" ,oldPrice: "1,600.00 DH", newPrice: "549.00 DH" },
            { id: 27,name: "HUGO BOSS The Scent - 100ML", img1: "images/homme/HUGO BOSS The Scent.webp", img2: "images/homme/HUGO BOSS The Scent 1.webp" ,oldPrice: "985.00 DH", newPrice: "549.00 DH" },
            { id: 28,name: "Y - Eau de Toilette", img1: "images/homme/Y.webp", img2: "images/homme/Y1.webp" ,oldPrice: "1,060.00 DH", newPrice: "549.00 DH" },
            { id: 29,name: "Armani Code Eau de Parfum", img1: "images/homme/Armani Code Eau de Parfum.webp", img2: "images/homme/Armani Code Eau de Parfum1.webp" ,oldPrice: "1,300.00 DH", newPrice: "499.00 DH" },
            { id: 30,name: "Aventus Creed cologne 120ML", img1: "images/homme/Aventus Creed cologne.webp", img2: "images/homme/Aventus Creed cologne1.webp" ,oldPrice: "755.00 DH", newPrice: "599.00 DH" },
            { id: 31,name: "YVES SAINT LAURENT La Nuit de L'Homme Eau de Toilette 100ML", img1: "images/homme/YVES SAINT LAURENT La Nuit de L'Homme.webp", img2: "images/homme/YVES SAINT LAURENT La Nuit de L'Homme1.webp" ,oldPrice: "895.00 DH", newPrice: "499.00 DH" },
            { id: 32,name: "BLEU DE CHANEL Eau De Parfum 100ML", img1: "images/homme/bleu-chanel1.webp", img2: "images/homme/P1922003_4.webp" ,oldPrice: "899.00 Dh", newPrice: "499.00 Dh" },
            ]

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
