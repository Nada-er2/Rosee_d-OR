function searchProducts() {
    const input = document.getElementById("searchInput").value.toLowerCase(); // Récupérer la valeur de la recherche
    const parfumGrid = document.getElementById("parfumGrid");
    // Réinitialiser le contenu de la grille avant d'ajouter les résultats filtrés
    parfumGrid.innerHTML = "";
    // Filtrer les produits en fonction de la recherche
    const filteredParfums = parfums.filter(parfum =>
        parfum.name.toLowerCase().includes(input)
    );

    // Si aucun résultat trouvé, afficher un message
    if (filteredParfums.length === 0) {
        parfumGrid.innerHTML = `<p style="text-align:center; font-size:16px; color:#888;">Aucun produit trouvé.</p>`;
        return;
    }

    // Afficher les produits filtrés
    filteredParfums.forEach(parfum => {
        const parfumItem = document.createElement("div");
        parfumItem.className = "parfum-item";
        parfumItem.innerHTML = `
            <div style="position: relative;">
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
// Gestion du clic sur l'icône de recherche
document.getElementById("searchIcon").addEventListener("click", function (event) {
    event.preventDefault(); 
    const searchInput = document.getElementById("searchInput");

    if (searchInput.style.display === "none" || searchInput.style.display === "") {
        searchInput.style.display = "block"; 
        searchInput.focus(); 
    } else {
        searchInput.style.display = "none"; 
    }
});
document.addEventListener("click", function (event) {
    const searchContainer = document.getElementById("searchContainer");
    const searchInput = document.getElementById("searchInput");

    if (!searchContainer.contains(event.target)) {
        searchInput.style.display = "none"; 
    }
    if (!searchInput.classList.contains("show")) {
    searchInput.classList.add("show");
    searchInput.style.display = "block";
    searchInput.focus();
} else {
    searchInput.classList.remove("show");
    searchInput.style.display = "none";
}

});