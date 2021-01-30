<?php
$response = array(
  'Payment' => $_GET['payment_id'],
  'Status' => $_GET['status'],
  'MerchantOrder' => $_GET['merchant_order_id']        
);
var_dump($response);
?>