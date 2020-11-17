<?php
    $dbHost = 'upa2.cgsghbdi9xdg.us-east-1.rds.amazonaws.com';
    $dbPort = '3306';
    $dbName = 'upa2';
    $dbUser = 'kracko';
    $dbPass = '#070814Cg';
    try {
        $pdo = new PDO("mysql:host={$dbHost};port={$dbPort};dbname={$dbName}", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>