<?php
function send_msg($mas)
{
global $tg_tkn,$global_cid;

//        $parseMode = null;
        $parseMode = "HTML";
        $disablePreview = false;
        $replyToMessageId = null;
        $replyMarkup = null;
//        $disableNotification = false;
        $disableNotification = true;
	if(!($cid*1))
	{
	$cid = $global_cid;;
	}
//print "!!!!!!!!!!!!!!!! cid $cid\n";
extract($mas,EXTR_OVERWRITE);
//error_reporting(65535);

$bot = new \TelegramBot\Api\Client($tg_tkn,null);
//$bot->sendMessage($cid, $txt);
$bot->sendMessage($cid, $txt,$parseMode,$disablePreview,$replyToMessageId,$replyMarkup,$disableNotification);
//error_reporting(0);

}
?>