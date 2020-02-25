<?php
$url = 'http://www.writephponline.com/';
$urlClean = implode('.', array_slice(explode('.', parse_url($url, PHP_URL_HOST)), -2));
    if ($urlClean == null) {
        echo $url;
    }
    echo $urlClean;
?>
