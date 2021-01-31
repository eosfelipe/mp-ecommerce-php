<?php
require_once 'vendor/autoload.php';
$ACCESS_TOKEN = "APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181";
//credentials
MercadoPago\SDK::setAccessToken($ACCESS_TOKEN);
$json = file_get_contents("php://input");
$data = json_decode($json);

switch($data->type) {
  case "payment":
    //TODO lógica del negocio
        // file_put_contents('notification.json', $json);
        http_response_code(200);
        $payment = MercadoPago\Payment.find_by_id($data->id);
        var_dump($payment);
        break;
    case "plan":
        $plan = MercadoPago\Plan.find_by_id($data->id);
        break;
    case "subscription":
        $plan = MercadoPago\Subscription.find_by_id($data->id);
        break;
    case "invoice":
        $plan = MercadoPago\Invoice.find_by_id($data->id);
        break;
}

?>