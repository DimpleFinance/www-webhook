<?php
function proxy_get()
{

global $proxy_mas,$glob;

switch($glob[chain_id])
{
    case "137":
        $disable_proxy = 0;
    break;
    default:
    $disable_proxy = 1;
}

$proxy = "";
if(!$disable_proxy)
{
$t = date("s");
$t *= 1;
$t = $proxy_mas[$t];
//print_r($t);
$t = explode("\t",$t);
//print_r($t);die;

if($t[0] && $t[1])
{
$proxy = "--proxy http://$t[0]:$t[1]";
//print $proxy;
//die;
}
}
return $proxy;
}