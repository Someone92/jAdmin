<?php
    $host = "127.0.0.1";
    $user = "root";
    $pass = "demo";
    $database = "jenscv";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8",$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch(PDOException $err) {
        die($err->getMessage());
    }

    /* Get values from ?delete= */
    $id = $_GET["delete"];

    /* Delete from portfolio, extra and service tables where id = ?delete=*/
    $sql = 'DELETE portfolio, extra, service FROM portfolio INNER JOIN extra, service WHERE portfolio.id = extra.id and portfolio.id = service.id and portfolio.id="'.$id.'"';

    /* Execute the SQL */
    $pdo->exec($sql);
    header("location: ../post.php");
?>