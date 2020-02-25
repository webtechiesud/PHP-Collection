<?php
/* CONVERT SECONDS TO DAYS, HOURS AND MINUTES */
$seconds = "56789";
$output = secsToStr($seconds);
echo $output;

function secsToStr($secs) {
	$r= '';
    if($secs>=86400)
	{
		$days=floor($secs/86400);
		$secs=$secs%86400;
		$r=$days.' day';
		if($days<>1)
		{
			$r.='s';
		}
		if($secs>0)
		{
			$r.=', ';
		}
	}
    if($secs>=3600)
	{
		$hours=floor($secs/3600);
		$secs=$secs%3600;
		$r.=$hours.' hour';
		if($hours<>1)
		{
			$r.='s';
		}
		if($secs>0)
		{
			$r.=', ';
		}
	}
    if($secs>=60)
	{
		$minutes=floor($secs/60);
		$secs=$secs%60;
		$r.=$minutes.' minute';
		if($minutes<>1)
		{
			$r.='s';
		}
		if($secs>0)
		{
			$r.=', ';
		}
	}
    $r.=$secs.' second';
	if($secs<>1)
	{
		$r.='s';
	}
    return $r;
}



function nicetime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}

echo "<br/>";
$date = "2019-03-09 03:45";
 echo $result = nicetime1($date); // 11 hours ago



function nicetime1($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }
 
    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}
?>
