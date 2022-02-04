var personnages = localStorage.getItem('tabPerso');
if (personnages) {
    personnages = JSON.parse(personnages, 'UTF-8');
} else personnages = [];

for (let i = 0; i < personnages.length; i++) {
    const element = personnages[i];
    var tabPersos = JSON.stringify(personnages);
    localStorage.setItem('tabPerso', tabPersos);
    afficheCard(element, mainCard, i);
}