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


function getFirstLine($text)
{
 $arrayLines=explode(".",$text);

 return $arrayLines[0];

}


function giveBreaks($text)
{
$arrayData=explode('.',$text);

for($i=0;$i<count($arrayData);$i++)
{
 echo $arrayData[$i].'.';
 if($i%3==0)
 echo '<br><br>';

}



}




?>