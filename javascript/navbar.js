let navbar = document.createElement('template');

navbar.innerHTML = `
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Accueil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        JS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/tp_jeu/index.html">TP JEU</a></li>
                        <li><a class="dropdown-item" href="/exercices/javascript/Events-1.html">Events-1</a></li>
                        <li><a class="dropdown-item" href="/exercices/javascript/Events-2.html">Events-2</a></li>
                        <!-- <li><hr class="dropdown-divider"></li> -->
                        <li><a class="dropdown-item" href="/exercices/javascript/Events-3.html">Events-3</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PHP
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/tp_php/index.php">TP</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        HTML/CSS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/chez_melo/html/chez_melo.html">TP Chez Mélo</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
`;

document.body.appendChild(navbar.content);