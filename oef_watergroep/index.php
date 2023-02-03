<?php
require "./db.inc.php";

$errors = ["Something went wrong!"];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["klant_id"])) {
    $form = array(
        "Voornaam" => $_POST["Voornaam"],
        "Naam" => $_POST["Naam"],
        "Straatnaam" => $_POST["Straatnaam"],
        "Nummerbus" => $_POST["Nummerbus"],
        "Postcode" => $_POST["Postcode"],
        "Locatie" => $_POST["Locatie"],
        "Meterstand" => $_POST["Meterstand"],
        "klant_id" => $_POST["klant_id"]
    );
    $insert_Values = [
        "Meterstand" => $_POST["Meterstand"],
        "klant_id" => $_POST["klant_id"]
    ];
    global $form;
    global $conn;
    $sql = "INSERT INTO `watergroep_klanten` (`klant_id`, `Voornaam`, `Naam`, `Straatnaam`, `Nummerbus`, `Postcode`, `Locatie`, `Created_at`, `Updated_at`, `Token`) VALUES ('1223', 'Jef', 'Saucisse', 'Worstendreef', '22', '1002', 'Broodje', '2023-02-03 13:04:07.000000', '2023-02-03 13:04:07.000000', '');";
    $stmt = $conn->prepare($sql);
    $stmt->execute($insertValues);
} else if (!isset($_GET["id"]) && !isset($_GET["error"])) {
    header("location: index.php?error=0");
}
if (isset($_GET["id"])) {
    $values = getInzending($_GET["id"])[0];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De Watergroep</title>
</head>

<body>
    <h1>De Watergroep</h1>
    <div class="formWrapper">
        <form action="index.php" method="post">
            <input type="hidden" name="id_klant" value="<?= $_GET["id"] ?>">
            <input type="text" name="Voornaam" value="<?= $values[$Voornaam] ?>">
            <input type="text" name="Naam" value="<?= $values[$Achternaam] ?>">
            <input type="text" name="Straatnaam" value="<?= $values[$Straatnaam] ?>">
            <input type="text" name="Nummerbus" value="<?= $values[$Nummerbus] ?>">
            <input type="text" name="Postcode" value="<?= $values[$Postcode] ?>">
            <input type="text" name="Locatie" value="<?= $values[$Locatie] ?>">
            <input type="text" name="Meterstand" value="<?= $values[$Meterstand] ?>">
            <button type="submit">Verzenden</button>
        </form>
    </div>
</body>

</html>