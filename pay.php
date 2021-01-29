<?php
require_once 'vendor/autoload.php';
$ACCESS_TOKEN = "APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181";
//credentials
MercadoPago\SDK::setAccessToken($ACCESS_TOKEN);
//Preference object
$preference = new MercadoPago\Preference();
//items
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.55;

$preference->items = array($item);
$preference->save();

echo $preference;
?>