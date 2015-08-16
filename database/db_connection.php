<?php
$DB_host = "127.0.0.1";
$DB_user = "root";
$DB_pass = "demo";
$DB_name = "jadmin";

try {
    $DB_con = new PDO("mysql:host=$DB_host;dbname=$DB_name",$DB_user,$DB_pass);
}
catch(PDOException $err) {
    echo $err->getMessage();
}
?>