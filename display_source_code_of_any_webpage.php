<?php 

//Display source code of any webpage

$lines = file('http://activeacademy.net/beta');
foreach ($lines as $line_num => $line) { 
	// loop thru each line and prepend line numbers
	echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br>\n";
}

?>
