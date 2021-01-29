<?php
require_once 'vendor/autoload.php';
$ACCESS_TOKEN = "APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181";
//credentials
MercadoPago\SDK::setAccessToken($ACCESS_TOKEN);

$path = "http://localhost/mp-ecommerce-php/";

$json = file_get_contents("php://input");
$data = json_decode($json);

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->id = $data->id;
$item->title = $data->name;
$item->description = $data->description;
$item->picture_url = $path . $data->urlImg;
$item->quantity = intval($data->quantity);
$item->unit_price = floatval($data->price);
$item->currency_id = "MXN";
$preference->items = array($item);

$payer = new MercadoPago\Payer();
$payer->name = "Lalo Landa";
$payer->email = "test_user_81131286@testuser.com";
$payer->phone = array(
  "area_code" => "+52",
  "number" => "5549737300"
);
$payer->address = array(
  "street_name" => "Insurgentes Sur",
  "street_number" => 1602,
  "zip_code" => "03940"
);
$preference->payer = $payer;

// $payment_methods = new MercadoPago



?>