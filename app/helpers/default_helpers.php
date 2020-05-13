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


function downloadFile($title,$body,$id,$created_at)
{
    // fopen($_SERVER['DOCUMENT_ROOT'].'test.txt','a+');
$file = '/home/art/Downloads/test.txt';
$txt = fopen($file, "a+") or die("Unable to open file!");
fwrite($txt, "$title\n\n".$body. "\nPost id is $id and is created at $created_at");
fclose($txt);

header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename='.basename($file));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize(2*$file));
header("Content-Type: text/plain");
readfile($file);

}



function returnMax($arr)
{
    return  array_keys($arr,max($arr))[0];
}

function randomizer()
{
$nr= rand(1,4);
switch($nr)
{
case 1:
    return 'Teknologji';
break;
case 2:
    return 'Bote';
break;
case 3:
    return 'Kulture';
break;
case 4:
    return 'Sport';
break;
default:
return;

} 
}


function sendEmail($id,$body,$toEmail='insane12333@gmail.com')
{
    
$subject = "Email ne postin me id $id";
$headers = "From: sender\'s email";

try
{
mail($toEmail,$subject,$body,$headers);
}
catch(\Throwable $th)
{
echo $th;
}
}
