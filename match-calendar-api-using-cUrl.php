<?php
 
$ch = curl_init();


$api_url  = "https://cricapi.com/api/matchCalendar?apikey=wfOIp3NKcJO5IfqqJSR5hSJAXfY2";

curl_setopt($ch, CURLOPT_URL, $api_url);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$respose= curl_exec($ch);



curl_close($ch);

$res=json_decode($respose);

$res=((array)$res);
?>

	<!DOCTYPE html>
<html lang="en">
<head>
  <title>Match Calendar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Current Matches</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
 
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
  	<?php foreach ($res['data'] as $key => $values) {  $value=((array)$values);?>
    <div class="col-sm-4">

      <h5> <?= $value['name'];?></h5>
      <p>Date <?= $value['date'];?></p>
    </div>
<?php } ?>

  </div>
</div>



</body>
</html>
