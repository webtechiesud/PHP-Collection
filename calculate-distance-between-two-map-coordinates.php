<?php 

/* CALCULATE DISTANCE BETWEEN TWO MAP COORDINATES */

$point1 = array('lat' => 28.561560, 'long' => -77.358856);
$point2 = array('lat' => 28.527958, 'long' => -77.289787);
$distance = getDistanceBetweenPointsNew($point1['lat'], $point1['long'], $point2['lat'], $point2['long']);
foreach ($distance as $unit => $value) {
    echo $unit.': '.number_format($value,4).'<br />';
}
/*
OUTPUT 
miles: 4.7918
feet: 25,300.9548
yards: 8,433.6516
kilometers: 7.7117
meters: 7,711.7310 
*/

function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2) {
    $theta = $longitude1 - $longitude2;
    $miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
    $miles = acos($miles);
    $miles = rad2deg($miles);
    $miles = $miles * 60 * 1.1515;
    $feet = $miles * 5280;
    $yards = $feet / 3;
    $kilometers = $miles * 1.609344;
    $meters = $kilometers * 1000;
    return compact('miles','feet','yards','kilometers','meters'); 
}
?>
