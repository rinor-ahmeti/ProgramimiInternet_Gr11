<?php
function validatePassword($password)
{
 


    $uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);

if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
return false;
}
    return true;


}


function validateEmail($email)
{
    return preg_match('/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.+-]/',$email);
    
}










?>