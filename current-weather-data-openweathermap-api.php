<?php
date_default_timezone_set('Asia/Kolkata');
//https://openweathermap.org/api_keys //  resgister for api kay
//http://bulk.openweathermap.org/sample/ sample city list in json format
$api="";
$cityid="1273293";//city id delhi
$url="https://api.openweathermap.org/data/2.5/weather?id=".$cityid."&appid=".$api;
$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$respose= curl_exec($ch);
$data= json_decode($respose);
//echo "<pre/>";print_r($data); die;
$time= time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Current weather data openweathermap</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
<h2>Current weather data using openweathermap API</h2>
</div>  
<div class="container">
  <div class="row">
  <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
      <h3><?= $data->name;?></h3>
      <img src="http://openweathermap.org/img/w/<?= $data->weather[0]->icon;?>.png">
      <p><strong>Time :</strong> <?= date("l g:i:a", $time);?></p>
      <p><strong>Date :</strong> <?= date("jS F Y", $time);?></p>
      <p><strong>Max :</strong> <?= $data->main->temp_max;?>&deg;C</p>
      <p><strong>Min :</strong> <?= $data->main->temp_max;?>&deg;C</p>
      <p><strong>Humidity :</strong> <?= $data->main->humidity;?></p>
      <p><strong>Wind :</strong> <?= $data->wind->speed;?> Km/h</p>
      <p><strong>Description :</strong> <?= ucwords($data->weather[0]->description);?></p>
    </div>
    <div class="col-sm-3">
    </div>
  </div>
</div>

</body>
</html>
