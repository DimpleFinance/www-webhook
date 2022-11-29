<?php

$a = file_get_contents('php://input');
$log[] = date("Y-m-d h:i:s");
$log[] = print_r($_REQUEST,1);
$log[] = $_SERVER['HTTP_X_FORWARDED_FOR'];
$log[] = $a;

$a = json_decode($a,1);
$b = json_encode($a,192);

$f = __DIR__."/logs/".microtime(true);
//print $f."\n";
$txt = implode("\n",$log);
file_put_contents($f,$txt);
if($b != "null")
{
include "../bin/conf.php";
$f2 = $f.".json";
file_put_contents($f2,$b);
$txt = $b;
        unset($m);
        $m[disablePreview] = true;
$kuda = "https://github.com/".$a[repository][full_name];
$txt = "Updated repository: <a href=\"$kuda\">".$a[repository][name]."</a>\n";
$txt .= "Pusher: ".$a["pusher"]["name"]."\n";;
//$txt .= "Pusher: ".$a["user_username"]."\n";;
//$txt .= print_r($a[commits],1);

$msg = $a[commits][0][message];
$msg = trim($msg);
$txt .= "Comments: <i>\"".$msg."\"</i>\n";
$kuda = $a[commits][0][url];
$txt .= "Detail: <a href=\"$kuda\">comit</a>\n";
//$txt .= "Detail: <A".."";
$k_mas[added] = "Added";
$k_mas[removed] = "Removed";
$k_mas[modified] = "Changed";

foreach($k_mas as $k=>$v2)
{
    if(count($a[commits][0][$k]))
//    if(count($a[commits][$k]))
    {
	$txt .= "<b><i>$v2</i></b>:\n";
	foreach($a[commits][0][$k] as $f)
	{
	    $txt .= "<i>".$f."</i>\n";
	}
    }
}

//$txt .= print_r($a,1);;

        $m[txt] = $txt;
        send_msg($m);

}

?>