<?php
//Amazon Clone 
$ch = curl_init();
$string_name='books';

$url= "https://www.amazon.in/s?k=$string_name";
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$respose= curl_exec($ch);
  preg_match_all("!https://m.media-amazon.com/images/I/[^\s]*?._AC_UL436_.jpg!", $respose, $matches);

  $images = array_values(array_unique($matches[0]));

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Image Gallery</h2>
  
  <div class="row">
<?php for ($i=0; $i < count($images); $i++) 
  {?>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="<?=$images[$i]?>" target="_blank">
          <img src="<?=$images[$i]?>" alt="Lights" class="img-rounded img-responsive" >          
        </a>
      </div>
    </div>
<?php } ?>
  </div>
</div>

</body>
</html>




<?php 
curl_close($ch);


?>
