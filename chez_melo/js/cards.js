var tabCards = [
    {
        "img": "/chez_melo/assets/burger.jpg",
        "alt": "Burger",
        "text": `-Pain artisanal
        -Steak
        haché ou poulet pané maison frit
        -Fromage au choix du moment
        -Légumes de saison
        -Sauce maison`,
        "prixSeul": "\n\nSeul : 8.00€",
        "prixMenu": "\nMenu : 10.00€"
    },
    {
        "img": "/chez_melo/assets/assiette.jpg",
        "alt": "Assiette",
        "text": `-Steak haché ou poulet pané maison frit
        -Frites maison`,
        "prixSeul": "\n\nSeul : 8.00€",
        "prixMenu": "\nMenu : 9.00€"
    },
    {
        "img": "/chez_melo/assets/salade.jpg",
        "alt": "Salade composée",
        "text": "Salade du moment",
        "prixSeul": "\n\nSeul : 8.00€",
        "prixMenu": "\nMenu : 10.00€"
    },
    {
        "img": "/chez_melo/assets/frite.jpeg",
        "alt": "Frite",
        "text": "Les frites\n\n",
        "prixSeul": "Portion grande frite : 2.50€\n",
        "prixMenu": "Petite frite : 1.50€"
    },
    {
        "img": "/chez_melo/assets/cristaline.jpg",
        "alt": "Bouteille d'eau",
        "text": "Boisson\n\n",
        "prixSeul": "Eau cristaline 50cl : 1.00€\n",
        "prixMenu": "Boisson 33cl : 1.50€"
    },
    {
        "img": "/chez_melo/assets/biere.jpg",
        "alt": "Bière",
        "text": "Bière\n\n",
        "prixSeul": "Bière artisanale : 3.50€\n",
        "prixMenu": "Bière 1664 33cl : 2.50€"
    },
];

// Récupération du conteneur
var mainCard = document.querySelector("#mainCard");

// Déclaration de la fonction afficheCard
/**
 * Fonction permettant de générer une card
 * @param {Object} item objet contenant les information à afficher
 * @param {Element} container conteneur qui va stocker la card générée
 */
function afficheCard(item, container) {
    // Création de la card
    var card = document.createElement('div');
    card.classList.add("card");
    card.style.width = "18rem";

    // Création de l'image
    var img = document.createElement('img');
    img.classList.add("card-img-top");
    img.setAttribute('alt', item.alt);
    img.style.width = 'auto'
    img.style.height = '200px';
    img.src = item.img;

    // Création de la div card-body
    var cardBody = document.createElement('div');
    cardBody.classList.add("card-body");

    // Création de p
    var p = document.createElement('p');
    p.classList.add("card-text");
    p.innerText = item.text + item.prixSeul + item.prixMenu;

    // Ajout des elements
    cardBody.appendChild(p);
    card.appendChild(img);
    card.appendChild(cardBody);
    container.appendChild(card);
}

for (let i = 0; i < tabCards.length; i++) {
    const element = tabCards[i];
    afficheCard(element, mainCard);
}