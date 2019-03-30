<?php
session_start();
include("packageloader.php");

class ShopCurrency {

}

$sql = "SELECT * FROM shop_currency";
$result = RunSQL($sql);
$currencies = [];

while ($currency = $result->fetch_object("ShopCurrency")) {
    array_push($currencies, $currency);
}
echo json_encode($currencies);
?>
