<?php 
    function connectDB() {
        try {
            $db = new PDO(
                'mysql:host=localhost;
                dbname='.getenv('HTTP_db').
                ';charset=utf8',
                getenv('HTTP_user'), getenv('HTTP_pwd'),
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
            return $db;
        } catch (PDOException $err) {
            $msg = "ERROR PDO in ".$err->getFile().
            " Ligne".$err->getLine()." : ".$err->getMessage();
            die($msg);
        }
    }
?>