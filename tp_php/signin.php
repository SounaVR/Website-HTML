<?php
    session_start();
    include('./error.php');
    $error = new ErrorHandler();
    $which;
    if (isset($_POST['submit'])) {
        // $id = count($_SESSION['listUser'])-1;
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (!empty($email) && !empty($username) && !empty($password)) {
            foreach ($_SESSION['listUser'] as $key => $value) {
                if ($value['email'] === $email && $value['username'] === $username && password_verify($password, $value['password'])) {
                    $_SESSION['auth'] = true;
                    $_SESSION['user'] = [
                        'id' => $value['id'],
                        'email' => $email,
                        'username' => $username,
                        'password' => $password
                    ];
                    header('Location: ./index.php');
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
        <link rel="stylesheet" href="/tp_php/css/main.css">
    </head>
    <body>  
        <script src="/javascript/navbar.js"></script>

        <?php include('./nav.php') ?>
        <br>
        <br>
        <h1 style="color: white;">Login</h1>
        <?php if (!empty($which)) $error->$which(); ?>
        <form id="form" method="POST">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="email@example.com" name="email">
                <label for="floatingInput">Email address</label>
                <div id="text" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <br>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="nickname" name="username">
                <label for="floatingInput">Username</label>
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
            <p style="color: white;">Don't have an account ? <a href="/tp_php/signup.php">Sign up here</a></p>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>