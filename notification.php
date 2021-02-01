<?php
// require_once 'vendor/autoload.php';
// $ACCESS_TOKEN = "APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181";
// //credentials
// MercadoPago\SDK::setAccessToken($ACCESS_TOKEN);
if($_SERVER['REQUEST_METHOD'] === "POST") {
  $json = file_get_contents("php://input");
  $data = json_decode($json);
  http_response_code(200);
  file_put_contents('notification.json', $json);
  error_log($json);
} else {
  http_response_code(500);
}

// switch($data->type) {
//   case "payment":
//     //TODO lógica del negocio
//     $payment = MercadoPago\Payment();
//     // $payment = MercadoPago\Payment.find_by_id($data->id);
//     if($payment) {
//             file_put_contents('notification.json', $json);
//             error_log($json);
//             http_response_code(200);
//         }
//         break;
//     case "plan":
//         $plan = MercadoPago\Plan.find_by_id($data->id);
//         break;
//     case "subscription":
//         $plan = MercadoPago\Subscription.find_by_id($data->id);
//         break;
//     case "invoice":
//         $plan = MercadoPago\Invoice.find_by_id($data->id);
//         break;
// }

?>