<?php
    // Connect to the database
    require_once('./modules/db_connect.php');

    $db = connectDB();

    // Results one ligne with fetch
    $query = "SELECT * FROM clients WHERE NUMERO_CLIENT = 412";
    $req = $db->query($query);
    $data = $req->fetch();
    // var_dump($data);

    // Results of table with fetch in a loop
    $query = "SELECT * FROM clients";
    $req = $db->query($query);
    while ($data = $req->fetch()) {
        // var_dump($data);
    }

    // Results of table with fetchAll
    $query = "SELECT * FROM clients";
    $req = $db->query($query);
    $array = $req->fetchAll();
    // var_dump($array);

    // Insert request
    // $count = $db->exec("INSERT INTO clients VALUES ('1', 'Gangnam', 'Style', '481 Oak', 'Lansing', 'USA', '727', '485', '2150', '03')");
    // var_dump($count);

    // Delete request
    // $count = $db->exec("DELETE FROM clients WHERE NUMERO_CLIENT = 1");
    // var_dump($count);

    $req->closeCursor();
    $db = NULL;
?>