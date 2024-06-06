<?php 

$dsn        = "mysql:host=localhost;Carset=Utf8;dbname=draft_decisions";
$db_user    = "root";
$db_pass    = "";
$ops = [
    PDO::ATTR_EMULATE_PREPARES      => false,
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC
];

try {

    $pdo = new PDO($dsn,$db_user,$db_pass,$ops);
    
}catch(PDOException $e) {
die($e->getMessage());
}

?>