<?php 
/* CHECK VALID EMAIL OR NOT */
$email = "a@b.c";
$check = is_validemail($email);
echo $check;//1

function is_validemail($email)
{
$check = 0;
if(filter_var($email,FILTER_VALIDATE_EMAIL))
{
$check = 1;
}
return $check;
}

?>
