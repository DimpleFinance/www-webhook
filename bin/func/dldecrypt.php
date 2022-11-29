<?php
function dldecrypt($crypttext)
{
//        $debuger = check_debugger(__FUNCTION__);

  global $dan_divider, $dan_key;

if(empty($dan_divider))
{
get_conf("dan_divider");
get_conf("dan_key");
}


  $crypttext=str_replace("-","/",$crypttext);
  $crypttext=base64_decode($crypttext);

  $iv=mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_TripleDES,MCRYPT_MODE_ECB),MCRYPT_RAND);
  $text=mcrypt_decrypt(MCRYPT_TripleDES,$dan_key,$crypttext,MCRYPT_MODE_ECB,$iv);

  $array=explode($dan_divider,$text);
  unset($array[0]);

  return $array;
}
?>