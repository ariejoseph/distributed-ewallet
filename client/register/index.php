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

      <h3>Register</h3>
      <form class="form-horizontal" method="post">
         <fieldset>
            <!-- Text input-->
            <div class="form-group">
               <label class="col-md-4 control-label">NPM</label>  
               <div class="col-md-4">
                  <input name="user_id" type="text" placeholder="" class="form-control input-md" value="<?php echo isset($_POST['user_id']) ? $_POST['user_id'] : '' ?>" required="TRUE">
               </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
               <label class="col-md-4 control-label">Nama</label>  
               <div class="col-md-4">
                  <input name="nama" type="text" placeholder="e.g. Joe" class="form-control input-md" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : '' ?>" required="TRUE">
               </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
               <label class="col-md-4 control-label">IP Domisili</label>  
               <div class="col-md-4">
                  <input name="ip_domisili" type="text" placeholder="152.118.33.xxx" class="form-control input-md" value="<?php echo isset($_POST['ip_domisili']) ? $_POST['ip_domisili'] : '' ?>" required="TRUE">
               </div>
            </div>
            <!-- Button -->
            <div class="form-group">
               <label class="col-md-4 control-label" for="submit"></label>
               <div class="col-md-4">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary">Register</button>
               </div>
            </div>
         </fieldset>
      </form>
      <?php
        if(isset($_POST['submit'])) {
          $npm = $_POST["user_id"];
          $nama = $_POST["nama"];
          $ip = $_POST["ip_domisili"];
          $app_info = array();
          $app_info = array("user_id" => $npm , "nama" => $nama, "ip_domisili" => $ip ); 
          $ch = curl_init("https://joseph.sisdis.ui.ac.id/ewallet/register");
          curl_setopt_array($ch, array(
              CURLOPT_POST => TRUE,
              CURLOPT_RETURNTRANSFER => TRUE,
              CURLOPT_HTTPHEADER => array(
              'Content-Type : application/json; charset=utf-8'),
              CURLOPT_POSTFIELDS => json_encode($app_info)
          ));
        
          $response = curl_exec($ch);
          $json = json_decode($response);
          $status = $json->success;
          if($status == 0){
              $result1 = "User telah terdaftar!";
          } else {
              $result1 = "Sukses melakukan registrasi";
          }
                  
          echo ("<h3>" . $result1 . "</h3>");
        }
      ?>
</div>
</body>
</html>