<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Hent HTML fra strompriser.no
$html = file_get_contents("https://www.strompriser.no/molde");

// Finn prisen med regex
if (preg_match('/Strømpris nå er ([0-9.,]+) kr\/kWh/', $html, $match)) {
    echo json_encode(["pris" => $match[1]]);
} else {
    echo json_encode(["pris" => null]);
}
?>
