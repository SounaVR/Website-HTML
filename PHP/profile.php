<?php
    session_start();
    include('./error.php');
    $error = new ErrorHandler();
    $which;

    if ($_SESSION['auth'] == false) {
        header('Location: /PHP/signin.php');
    }

    if (isset($_POST['submit'])) {
        $user = $_SESSION['user'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if (!empty($email) && !empty($username) && !empty($password) && !empty($confirmPassword)) {
            $emailValid = true;
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailValid = false;
                $which = 'emailSyntaxInvalid';
            }
            if ($emailValid) {
                if ($password === $confirmPassword) {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $user = [
                        "id" => $user['id'],
                        "email" => $email,
                        "username" => $username,
                        "password" => $hash
                    ];
                    $_SESSION['listUser'][$user['id']-1] = $user;
                    $_SESSION['user'] = $user;
                    header('Refresh:0');
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
        <title>[PHP] Profile</title>

        <script src="https://kit.fontawesome.com/c08589246e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/PHP/css/main.css">
    </head>
    <body>  
        <script src="/javascript/navbar.js"></script>

        <?php include('./nav.php') ?>
        <br>
        <br>
        <h1 style="color: white;">Bienvenue <?php echo htmlspecialchars($_SESSION['user']['username']) ?> </h1>
        <?php if (!empty($which)) $error->$which(); ?>
        <form id="form" method="POST">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="email@example.com" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
                <label for="floatingInput">Email address</label>
                <div id="text" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <br>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="nickname" name="username" value="<?php echo $_SESSION['user']['username'] ?>">
                <label for="floatingInput">Username</label>
            </div>
            <br>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput" placeholder="123" name="password">
                <label for="floatingInput" class="form-label">New password</label>
            </div>
            <br>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput" placeholder="123" name="confirmPassword">
                <label for="floatingInput" class="form-label">Confirm new password</label>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>