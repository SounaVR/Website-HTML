<?php
    // Connect to the database
    require_once('./modules/bdd_connect.php');

    $bdd = connectDB();

    // Results one ligne with fetch
    $query = "SELECT * FROM clients WHERE NUMERO_CLIENT = 412";
    $stmt = $bdd->query($query);
    $data = $stmt->fetch();
    // var_dump($data);

    // Results of table with fetch in a loop
    $query = "SELECT * FROM clients";
    $stmt = $bdd->query($query);
    while ($data = $stmt->fetch()) {
        var_dump($data);
    }
?>