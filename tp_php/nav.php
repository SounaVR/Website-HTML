<?php 
    if (isset($_GET['logout'])) {
        $_SESSION['auth'] = false;
        $_SESSION['user'] = null;
        header('Location: /tp_php/signin.php');
    }
?>

<nav id="tp_php">
    <a href="/tp_php/index.php">Accueil</a>
    <a href="/tp_php/profile.php">Profile</a>
    <a href="/tp_php/signin.php">Sign in</a>
    <a href="/tp_php/signup.php">Sign up</a>
    <?php if ($_SESSION['auth']) { ?>
        <a href="/tp_php/users.php">Users</a>
        <form class="form" method="GET">
            <button type="submit" name="logout" class="btn btn-primary">Logout</button>
        </form>
    <?php } ?>
</nav>