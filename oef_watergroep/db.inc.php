<?php
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'functioneelprogrammeren';
$db_port = 8889;

try {
    $pdo = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}



function getInzending()
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT inzending_id, Voornaam, Naam, Straatnaam, Postcode, Nummerbus, Locatie, Meterstand, klant_id FROM `watergroep_inzendingen` where id = 1223");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
