<?php 
    try {
        $host = "localhost";
        $dbname = "id21734670_lherjohn";
        $user = "id21734670_djlerjohn";
        $password = "Lherjohn_01";

        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
?>