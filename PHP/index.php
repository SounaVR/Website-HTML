<?php
    session_start();
    var_dump($_SESSION['listUser']);

    if (isset($_SESSION['listUser'])) {
        $tab = $_SESSION['listUser'];
    } else {
        $tab = [];
        $_SESSION['listUser'] = $tab;
    }

    if (!isset($_SESSION['auth'])) {
        $_SESSION['auth'] = false;
    }

    if ($_SESSION['auth'] == false) {
        header('Location: /PHP/signin.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <script src="/javascript/head.js"></script>
        <title>[PHP] Accueil</title>

        <script src="https://kit.fontawesome.com/c08589246e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/PHP/css/main.css">
    </head>
    <body>  
        <script src="/javascript/navbar.js"></script>

        <?php include('./nav.php') ?>
        <br>
        <br>
        <h1 style="color: white;">Bienvenue <?php echo htmlspecialchars($_SESSION['user'][1]) ?> </h1>
        <br>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>