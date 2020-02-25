<?php 


//searches_and_highlighted_keyword
function highlighter_text($text, $words)
{
    $split_words = explode( " " , $words );
    foreach($split_words as $word)
    {
        $color = "#4285F4";
        $text = preg_replace("|($word)|Ui" ,
            "<span style=\"color:".$color.";\"><b>$1</b></span>" , $text );
    }
    return $text;
}

$string = "Hi, I am Sudhanshu Web Developer working from last 3.2yr in industry. I have worked on Website Design and Development both with Html , Css , Jquery , javascript , WordPress , PHP , Magento ,Codeigniter etc.";
$words = "Sudhanshu Web Developer";
echo highlighter_text($string ,$words);
 

?>
