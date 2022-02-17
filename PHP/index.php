<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <script src="/javascript/head.js"></script>
        <title>Accueil PHP</title>

        <script src="https://kit.fontawesome.com/c08589246e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/PHP/css/main.css">
    </head>
    <body>  
        <script src="/javascript/navbar.js"></script>
        <p>
        <?php
            $n1 = 3;
            $n2 = 2;
            $somme = $n1 + $n2;
            $difference = $n1 - $n2;
            $produit = $n1 * $n2;
            $quotient = $n1 / $n2;
            $reste = $n1 % $n2;
            $puissance = $n1 ** $n2;
        
            echo $n1." x ".$n2." = ".$produit."<br>";
            echo $n1." - ".$n2." = ".$difference."<br>";
            echo $n1." + ".$n2." = ".$somme."<br>";
            echo $n1." ÷ ".$n2." = ".$quotient."<br>";
            echo $n1." % ".$n2." = ".$reste."<br>";
            echo $n1."² ".$n2." = ".$puissance."<br>";
        ?>
        </p>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>