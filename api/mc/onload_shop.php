<?php
session_start();
include("packageloader.php");

//Create blank classes... ->fetch_object will write the variables for us.
class Shop {}
class ShopTab {}
class ShopTabItem {}

$shopData = [];
$sql = "SELECT * FROM shop";
$result = RunSQL($sql);

//Go through all of the shops...
while ($currentShop = $result->fetch_object("Shop")) {
    //Shop -> Shop Tabs -> Shop Tab Items
    $shop = (array) $currentShop;
    $shop['tabs'] = [];

    //Add in SHOP data.
    $shopID = $currentShop->ID;
    //Grab all of the shop tabs
    $sql = "SELECT * from shop_tab WHERE shopID='$shopID'";
    $shopTabResult = RunSQL($sql);

    while ($currentShopTab = $shopTabResult->fetch_object("ShopTab")) {
        $shopTabID = $currentShopTab->ID;
        $shopTab = (array) $currentShopTab;
        $shopTab['items'] = [];
        //Grab all of shop items.
        $sql = "SELECT * FROM shop_tab_item WHERE shopTabID='$shopTabID'";
        $shopTabItemResult = RunSQL($sql);

        while ($currentShopItem = $shopTabItemResult->fetch_object("ShopTabItem")) {
            array_push($shopTab['items'], $currentShopItem);
        }

        array_push($shop['tabs'], $shopTab);

    }

    array_push($shopData, $shop);

}


echo json_encode($shopData);

?>
