<!DOCTYPE html>
<html lang="en">
<head>
  <title>e-wallet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Service</h2>
  <ul class="nav nav-tabs nav-justified">
    <li><a role="presentation" href="https://joseph.sisdis.ui.ac.id/ewallet/client/register">Register</a></li>
    <li><a role="presentation" href="https://joseph.sisdis.ui.ac.id/ewallet/client/transfer">Transfer</a></li>
    <li><a role="presentation" href="https://joseph.sisdis.ui.ac.id/ewallet/client/getSaldo">Get Saldo</a></li>
    <li><a role="presentation" href="https://joseph.sisdis.ui.ac.id/ewallet/client/getTotalSaldo">Get Total Saldo</a></li>
    <li><a role="presentation" href="https://joseph.sisdis.ui.ac.id/ewallet/client/quorum">Quorum</a></li>
  </ul>

      <h3>List of server online:</h3>
      <ul class="list-group">
      <?php
        $ch = curl_init("https://joseph.sisdis.ui.ac.id/ewallet/healthCheck");
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
            'Content-Type : application/json; charset=utf-8'),
            CURLOPT_POSTFIELDS => json_encode($app_info)
        ));
      
        $response = curl_exec($ch);
        $json = json_decode($response);
        foreach ($json as $active) {
          echo '<li class="list-group-item">'.$active.'</li>';
        }
      ?>
      </ul>
</div>
</body>
</html>