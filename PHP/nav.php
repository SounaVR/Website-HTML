<?php 
    if (isset($_GET['logout'])) {
        $_SESSION['auth'] = false;
        header('Location: /PHP/signin.php');
    }
?>

<nav id="tp_php">
    <a href="/PHP/home.php">Home</a>
    <a href="/PHP/index.php">Accueil</a>
    <a href="/PHP/profile.php">Profile</a>
    <a href="/PHP/signin.php">Sign in</a>
    <a href="/PHP/signup.php">Sign up</a>
    <?php if ($_SESSION['auth']) { ?>
        <form class="form" method="GET">
            <button type="submit" name="logout" class="btn btn-primary">Logout</button>
        </form>
    <?php } ?>
</nav>