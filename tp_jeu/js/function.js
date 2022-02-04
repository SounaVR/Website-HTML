function recupListePersos() {
    var personnages = localStorage.getItem('tabPerso');
    if (personnages) {
        personnages = JSON.parse(personnages, 'UTF-8');
    } else personnages = [];

    return personnages;
}

// Récupération du conteneur
var mainCard = document.querySelector("#mainCard");

// Déclaration de la fonction afficheCard
/**
 * Fonction permettant de générer une card
 * @param {Object} item objet contenant les information à afficher
 * @param {Element} container conteneur qui va stocker la card générée
 */
function afficheCard(item, container, i) {
    // Création de la card
    var card = document.createElement('div');
    card.classList.add("card");
    card.style.width = "18rem";

    // Création de la div card-body
    var cardBody = document.createElement('div');
    cardBody.classList.add("card-body");
    cardBody.innerHTML = `<h5 class=\"card-title\">${item.Nom}</h5>`;

    // Création de p
    var p = document.createElement('p');
    p.classList.add("card-text");
    var uwu = '';
    for (const key in item) {
        const element = item[key];
        uwu = uwu + key + ' : ' + element + "\n";
    }
    p.innerText = uwu;

    // Création du selectButton
    var selectButton = document.createElement('a');
    selectButton.setAttribute('href', '#');
    selectButton.classList.add('btn');
    selectButton.classList.add('btn-primary');
    selectButton.innerText = 'Sélectionner';

    // Création du deleteButton
    var deleteButton = document.createElement('a');
    deleteButton.setAttribute('href', '#');
    deleteButton.classList.add('btn');
    deleteButton.classList.add('btn-danger');
    deleteButton.setAttribute('onclick', "supPerso("+i+")");
    deleteButton.innerText = 'Supprimer';

    // Ajout des elements
    p.appendChild(selectButton);
    p.appendChild(deleteButton);
    cardBody.appendChild(p);
    card.appendChild(cardBody);
    container.appendChild(card);
}

// Fonction de sauvegarde du tableau personnages
function savePersos(personnages) {
    // Stockage du tableau dans le navigateur
    var tabPersos = JSON.stringify(personnages, 'UTF-8');
    localStorage.setItem('tabPerso', tabPersos);
}

function createPerso() {
    var personnage = {};
    personnage.Nom = document.getElementById('Nom').value;
    if (!personnage.Nom) return;
    personnage.Classe = document.getElementById('Classe').value;
    personnage.Arme = document.getElementById('Arme').value;
    personnage.Endurance = document.getElementById('Endurance').value;
    personnage.Force = document.getElementById('Force').value;
    personnage.Agilité = document.getElementById('Agilité').value;
    personnage.Intelligence = document.getElementById('Intelligence').value;
    console.log(personnage)
    personnages = recupListePersos();

    personnages.push(personnage);
    savePersos(personnages);
}

function supPerso(i) {
    personnages = recupListePersos();
    if (personnages) {
        personnages.splice(i, 1);

        savePersos(personnages);

        document.location.reload();
    } 
}


const allRanges = document.querySelectorAll(".range-wrap");
allRanges.forEach(wrap => {
    const range = wrap.querySelector(".form-range");
    const bubble = wrap.querySelector(".bubble");

    range.addEventListener("input", () => {
        setBubble(range, bubble);
    });
    setBubble(range, bubble);
});

function setBubble(range, bubble) {
    const val = range.value;
    const min = range.min ? range.min : 0;
    const max = range.max ? range.max : 100;
    const newVal = Number(((val - min) * 100) / (max - min));
    bubble.innerHTML = val;

    // Sorta magic numbers based on size of the native UI thumb
    bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
}