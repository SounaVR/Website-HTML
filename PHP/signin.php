<?php
    session_start();
    include('./error.php');
    $error = new ErrorHandler();
    $which;
    if (isset($_POST['submit'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            foreach ($_SESSION['listUser'] as $key => $value) {
                if ($value['email'] === $_POST['email'] && $value['password'] === $_POST['password']) {
                    $_SESSION['auth'] = true;
                    header('Location: /PHP/index.php');
                } else {
                    $which = 'badCredentials';
                }
            }
        } else {
            $which = 'emptyFields';
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <script src="/javascript/head.js"></script>
        <title>[PHP] Sign in</title>

        <script src="https://kit.fontawesome.com/c08589246e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/PHP/css/main.css">
    </head>
    <body>  
        <script src="/javascript/navbar.js"></script>

        <?= include('./nav.php') ?>
        <br>
        <br>
        <h1 style="color: white;">Login</h1>
        <?php
            switch ($which) {
                case 'badCredentials':
                    $error->badCredentials();
                    break;
                case 'emptyFields':
                    $error->emptyFields();
                    break;
            }
        ?>
        <form id="form" method="POST">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="email@example.com" name="email">
                <label for="floatingInput">Email address</label>
                <div id="text" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <br>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput" placeholder="123" name="password">
                <label for="floatingInput" class="form-label">Password</label>
            </div>
            <br>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="checkbox">
                <label id="text" class="form-check-label" for="exampleCheck1">Stay connected</label>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
            <br>
            <p style="color: white;">Don't have an account ? <a href="/PHP/signup.php">Sign up here</a></p>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>