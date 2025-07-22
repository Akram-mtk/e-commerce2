function ajouterAuPanier(nom, image, pointure, buttonElement, prix) {
  const productCard = buttonElement.closest(".product-card");

  const oldError = productCard.querySelector(".erreur-pointure");
  if (oldError) oldError.remove();

  if (!pointure) {
    const erreur = document.createElement("div");
    erreur.textContent = "❗ Veuillez sélectionner une pointure.";
    erreur.className = "erreur-pointure";
    erreur.style.color = "red";
    erreur.style.marginTop = "5px";
    productCard.appendChild(erreur);
    return;
  }

  const panier = JSON.parse(localStorage.getItem('panier')) || [];
  const produit = { nom, image: 'images/' + image, pointure, prix };
  panier.push(produit);
  localStorage.setItem('panier', JSON.stringify(panier));

  updateCartCount();
}


function updateCartCount() {
  const panier = JSON.parse(localStorage.getItem('panier')) || [];
  const cartCount = document.getElementById('cart-count');
  cartCount.textContent = panier.length;
}

function afficherApercuPanier() {
  let panier = JSON.parse(localStorage.getItem("panier")) || [];
  const conteneur = document.getElementById("apercu-panier");
  conteneur.innerHTML = ""; 
  if (panier.length === 0) {
    conteneur.innerHTML = "<p style='padding:1rem'>Votre panier est vide.</p>";
    return;
  }
  
  panier.forEach(produit => {
    const produitDiv = document.createElement("div");
    produitDiv.classList.add("produit-apercu");
    produitDiv.innerHTML = `
      <img src="${produit.image}" alt="${produit.nom}" />
      <div>
        <p><strong>${produit.nom}</strong></p>
        <p>Pointure : ${produit.pointure}</p>
        <p>${produit.prix.toFixed(2)} $</p>
      </div>
    `;
    conteneur.appendChild(produitDiv);
  });
}


const cartLink = document.getElementById("cart-link");
const apercuPanier = document.getElementById("apercu-panier");

cartLink.addEventListener("mouseenter", () => {
  afficherApercuPanier();
  apercuPanier.style.display = "block";
});

cartLink.addEventListener("mouseleave", () => {
  apercuPanier.style.display = "none";
});

apercuPanier.addEventListener("mouseleave", () => {
  apercuPanier.style.display = "none";
});

apercuPanier.addEventListener("mouseenter", () => {
  apercuPanier.style.display = "block";
});

window.onload = updateCartCount;

function getSelectedSize(button) {
  const radios = button.closest('.product-card').querySelectorAll('input[type="radio"]');
  for (const radio of radios) {
    if (radio.checked) return radio.value;
  }
  return null;
}
