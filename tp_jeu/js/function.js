// Get every charaters or create an empty array
function getCharacters() {
    var characters = localStorage.getItem('tabCharacters');
    if (characters) {
        characters = JSON.parse(characters, 'UTF-8');
    } else characters = [];

    return characters;
}

// Get the main div
var mainCard = document.querySelector("#mainCard");

/**
 * Function for generate a card
 * @param {Object} item contains the informations
 * @param {Element} container who store the generated card
 * @param {Number} i character id
 */
function displayCards(item, container, i) {
    // Create the card
    var card = document.createElement('div');
    card.classList.add("card");
    card.style.width = "18rem";

    // Create the div card-body
    var cardBody = document.createElement('div');
    cardBody.classList.add("card-body");
    cardBody.innerHTML = `<h5 class=\"card-title\">${item.Name}</h5>`;

    // Create the p with the elements
    var p = document.createElement('p');
    p.classList.add("card-text");
    var uwu = '';
    for (const key in item) {
        const element = item[key];
        uwu += key + ' : ' + element + "\n";
    }
    p.innerText = uwu;

    // Create the selectButton
    var editButton = document.createElement('button');
    editButton.setAttribute('type', 'button');
    editButton.classList.add('btn', 'btn-primary');
    editButton.setAttribute('data-bs-toggle', 'modal');
    editButton.setAttribute('data-bs-target', '#editCharacterModal');
    editButton.setAttribute('data-id', i);
    editButton.innerText = 'Modifier';

    // Create the deleteButton
    var deleteButton = document.createElement('a');
    deleteButton.setAttribute('type', 'button');
    deleteButton.classList.add('btn', 'btn-danger');
    deleteButton.setAttribute('onclick', 'supCharacter('+i+')');
    deleteButton.innerText = 'Supprimer';

    // Add the onclick with the desired character on the modal save button
    var saveChangesButton = document.getElementById('saveButton');
    saveChangesButton.setAttribute('onclick', 'editCharacter('+i+')');

    // Add the elements
    p.appendChild(editButton);
    p.appendChild(deleteButton);
    cardBody.appendChild(p);
    card.appendChild(cardBody);
    container.appendChild(card);
}

// Save the characters array
function saveCharacters(characters) {
    // Store the array inside the browser
    var tabCharacters = JSON.stringify(characters, 'UTF-8');
    localStorage.setItem('tabCharacters', tabCharacters);
}

// Create the character and store it
function createCharacter() {
    var characters = getCharacters();
    var character = {};
    character.Name = document.getElementById('Name').value;
    if (!character.Name) return;
    character.Class = document.getElementById('Class').value;
    character.Weapon = document.getElementById('Weapon').value;
    character.Stamina = document.getElementById('Stamina').value;
    character.Strength = document.getElementById('Strength').value;
    character.Agility = document.getElementById('Agility').value;
    character.Intelligence = document.getElementById('Intelligence').value;

    characters.push(character);
    saveCharacters(characters);
}

// Delete a character
function supCharacter(i) {
    console.log("je suis en vie")
    var characters = getCharacters();
    if (characters) {
        characters.splice(i, 1);

        saveCharacters(characters);

        document.location.reload();
    } 
}

// Select a character
function selectCharacter(i) {
    var characterList = getCharacters();
    var character = characterList[i]
    
    return character;
}

// Edit the selected character
function editCharacter(i) {
    var characterList = getCharacters();
    var character = characterList[i];

    character.Name = document.getElementById('Name').value;
    if (!character.Name) return;
    character.Class = document.getElementById('Class').value;
    character.Weapon = document.getElementById('Weapon').value;
    character.Stamina = document.getElementById('Stamina').value;
    character.Strength = document.getElementById('Strength').value;
    character.Agility = document.getElementById('Agility').value;
    character.Intelligence = document.getElementById('Intelligence').value;

    saveCharacters(characterList);
    document.location.reload();
}

// Prefilled the edit modal form
function putCharacterData(i) {
    var characterList = getCharacters();
    var character = characterList[i];
    document.getElementById('modalLabel').innerText = 'Modification de ' + character.Name;

    document.getElementById('Name').value = character.Name;
    document.getElementById('Class').value = character.Class;
    document.getElementById('Weapon').value = character.Weapon;
    document.getElementById('Stamina').value = character.Stamina;
    document.getElementById('Strength').value = character.Strength;
    document.getElementById('Agility').value = character.Agility;
    document.getElementById('Intelligence').value = character.Intelligence;
}