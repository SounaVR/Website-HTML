<?php
    session_start();
    include('./error.php');
    $error = new ErrorHandler();
    $which;
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if (!empty($email) && !empty($password) && !empty($confirmPassword)) {
            $emailValid = true;
            foreach ($_SESSION['listUser'] as $key => $value) {
                if ($value['email'] === $email) {
                    $emailValid = false;
                    $which = 'mailTaken';
                    break;
                }
            }
            if ($emailValid) {
                if ($password === $confirmPassword) {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $tab = [
                        "email" => $email,
                        "password" => $hash
                    ];
                    $_SESSION['listUser'][] = $tab;
                    header("Location: ./index.php");
                } else {
                    $which = 'passwordDoesntMatch';
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
        <title>[PHP] Sign up</title>

        <script src="https://kit.fontawesome.com/c08589246e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/PHP/css/main.css">
    </head>
    <body>  
        <script src="/javascript/navbar.js"></script>

        <?php include('./nav.php') ?>
        <br>
        <br>
        <h1 style="color: white;">Register</h1>
        <?php if (!empty($which)) $error->$which(); ?>
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
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput" placeholder="123" name="confirmPassword">
                <label for="floatingInput" class="form-label">Confirm Password</label>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Register</button>
            <br>
            <p style="color: white;">Already have an account ? <a href="/PHP/signin.php">Sign in here</a></p>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>