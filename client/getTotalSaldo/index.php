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
  </ul>

      <h3>Get Total Saldo</h3>
      <form class="form-horizontal" method="post">
         <fieldset>
            <!-- Text input-->
            <div class="form-group">
               <label class="col-md-4 control-label">NPM</label>  
               <div class="col-md-4">
                  <input name="user_id" type="text" class="form-control input-md" value="<?php echo isset($_POST['user_id']) ? $_POST['user_id'] : '' ?>" required="TRUE">
               </div>
            </div>
            <!-- Button -->
            <div class="form-group">
               <label class="col-md-4 control-label" for="submit"></label>
               <div class="col-md-4">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary">Check</button>
               </div>
            </div>
         </fieldset>
      </form>
      <?php
        if(isset($_POST['submit'])) {
          $npm = $_POST["user_id"];
          $app_info = array();
          $app_info = array("user_id" => $npm); 
          $ch = curl_init("https://joseph.sisdis.ui.ac.id/ewallet/getTotalSaldo");
          curl_setopt_array($ch, array(
              CURLOPT_POST => TRUE,
              CURLOPT_RETURNTRANSFER => TRUE,
              CURLOPT_HTTPHEADER => array(
              'Content-Type : application/json; charset=utf-8'),
              CURLOPT_POSTFIELDS => json_encode($app_info)
          ));
        
          $response = curl_exec($ch);
          $json = json_decode($response);
          $total_saldo = $json->nilai_saldo;
          if($total_saldo == 0){
              $result4 = "User tidak terdaftar!";
          } else {
              $result4 = "Nilai saldo: " . $total_saldo ;
          }
                  
          echo ("<h3>" . $result4 . "</h3>");
        }
      ?>
</div>
</body>
</html>