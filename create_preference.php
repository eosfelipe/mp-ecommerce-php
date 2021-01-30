<?php
require_once 'vendor/autoload.php';
$ACCESS_TOKEN = "APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181";
//credentials
MercadoPago\SDK::setAccessToken($ACCESS_TOKEN);

$path = "http://localhost/mp-ecommerce-php/";

$json = file_get_contents("php://input");
$data = json_decode($json);
//preference
$preference = new MercadoPago\Preference();
//item
$item = new MercadoPago\Item();
$item->id = $data->id;
$item->title = $data->name;
$item->description = $data->description;
$item->picture_url = $path . $data->urlImg;
$item->quantity = intval($data->quantity);
$item->unit_price = floatval($data->price);
$item->currency_id = "MXN";
$preference->items = array($item);
//payer
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



$preference->payment_methods = array(
  "excluded_payment_methods" => array("id" => "amex"),
  "installments" => 6
);


$preference->back_urls = array(
  "success" => $path . "feedback.php",
  "failure" => $path . "feedback.php",
  "pending" => $path . "feedback.php"
);
// $preference->auto_return = "approved";
$preference->external_reference = $data->orderNumber;
$preference->save();

$response = array(
  "id" => $preference->id,
);

echo json_encode($response);


?>