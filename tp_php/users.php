<?php
    session_start();

    if ($_SESSION['auth'] == false) {
        header('Location: /tp_php/signin.php');
    }
    
    if (!empty($_POST)) {
        $id;
        foreach ($_POST as $key => $value) {
            $id = $key;
        }
        array_splice($_SESSION['listUser'], $id-1, 1);
        $jamy = 1;
        foreach ($_SESSION['listUser'] as $key => $value) {
            $_SESSION['listUser'][$key]['id'] = $jamy;
            $jamy++;
        }
        header('Refresh:0');
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <script src="/javascript/head.js"></script>
        <title>[PHP] Accueil</title>

        <script src="https://kit.fontawesome.com/c08589246e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/tp_php/css/main.css">
    </head>
    <body>  
        <script src="/javascript/navbar.js"></script>

        <?php include('./nav.php') ?>
        <br>
        <br>
        <h1 style="color: white;">Bienvenue <?php echo htmlspecialchars($_SESSION['user']['username']) ?> </h1>
        <br>

        <table class="table">
            <thead class="table-dark">
                <tr>
                <th scope="col">Mail</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($_SESSION['listUser'] as $key => $value) {
                        $id = $value['id'];
                        $email = $value['email'];
                        $username = $value['username'];
                        echo "
                            <tr>
                                <td>$email</td>
                                <td>$username</td>
                                <form method='post'>
                                    <td><button type='submit' name='$id' class='btn btn-danger'>Supprimer</button></td>
                                </form>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>