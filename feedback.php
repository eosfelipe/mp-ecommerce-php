<?php
$response = $_SERVER["QUERY_STRING"];
parse_str(html_entity_decode($response), $out);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>Tienda e-commerce | <?php echo $out['status']?></title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
  }
  body { background: #f9f9f9; }
  .container {
    width: 100%;
    height: 100%;
    padding: 0 4rem;
    color: #565665;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }
  .heading, .description, .btn {
    padding: 1rem;
    margin: 1rem;
  }
  .description {
    font-size: 18px;
    background: #f2f2f2;
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
  .col1, .col2 {
    margin: 2rem;
  }
  .image img{
    width: 250px;
    border-radius: 50%; 
  }
  .btn {
    outline: none;
    border-radius: 4px;
    background: #00AAE8;
    color: #f9f9f9;
    font-weight: bold;
    padding: 1rem 1rem;
    text-decoration: none;
  }
  </style>
</head>
<body>
  <div class="container">
  <div class="heading">
  <h1>
  <?php
  if($out['status'] === 'approved') {
    echo 'Pago Aprobado';
  } else if($out['status'] === 'rejected') {
    echo 'Pago Rechazado, puede intentar de nuevo';
  } else if($out['status'] === 'pending' || $out['status'] === 'in_process') {
    echo 'Pago Pendiente';
  } else {
    echo 'Algo salió mal';
  }
  ?>
  </h1>
  </div>
  <div class="description">
  <?php if($out['status'] === 'approved'):?>
  <div class="col1">
  <strong>ID de pago: </strong><?php echo $out['payment_id']?> <br/>
  <strong>Método de pago: </strong><?php echo $out['payment_type']?> <br/>
  <strong>#Orden tienda: </strong><?php echo $out['merchant_order_id']?> <br/>
  </div>
  <div class="col2">
  <strong>ID sitio: </strong><?php echo $out['site_id']?> <br/>
  <strong>ID preferencia: </strong><?php echo $out['preference_id']?> <br/>
  <strong>Referencia vendedor: </strong><?php echo $out['external_reference']?> <br/>
  </div>
  <?php endif;?>
  </div>
  <div class="image">
  <?php if($out['status'] === 'approved') echo '<img src="assets/ok.svg" alt="">' ?>
  <?php if($out['status'] === 'rejected') echo '<img src="assets/cancel.svg" alt="">' ?>
  <?php if($out['status'] === 'pending') echo '<img src="assets/pending.svg" alt="">' ?>
  </div>
  <a href="/mp-ecommerce-php" class="btn">Regresar a la tienda</a>
  </div>
</body>
</html>