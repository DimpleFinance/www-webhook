<?php
//============================== криптовалка и декриптовалка урла
//$dan_divider="~";
//$dan_key="obndpuar";

function dlencrypt($array)
{
//        $debuger = check_debugger(__FUNCTION__);

  global $dan_divider, $dan_key;

if(empty($dan_divider))
{
get_conf("dan_divider");
get_conf("dan_key");
}

  $text=implode($dan_divider,$array);
  $text=rand(0,999999).$dan_divider.$text;


  $iv=mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_TRIPLEDES,MCRYPT_MODE_ECB),MCRYPT_RAND);

$len = strlen($dan_key);
if($len!=24)
{
    print "Modify dan_key to strlen =24\n";
}
/*
while($len<24)
{
$iv .= "\0";
$len++;
}

print "iv='$iv'\n";
print "iv len=".strlen($iv)."\n";
print "dan_key=$dan_key\n";
print "dan_key len=".strlen($dan_key)."\n";

print "text=".$text."\n";
*/

  $crypttext = mcrypt_encrypt(MCRYPT_TRIPLEDES,$dan_key,$text,MCRYPT_MODE_ECB,$iv);
// $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$plaintext, MCRYPT_MODE_CBC, $iv);

  $crypttext=base64_encode($crypttext);
  $crypttext=str_replace("/","-",$crypttext);

  return $crypttext;
}
?>