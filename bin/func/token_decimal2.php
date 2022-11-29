<?php
function token_decimal2($n)
{
global $token_decimal;
    if(!isset($token_decimal[$n]))
    $o = 18;
    else
    $o = $token_decimal[$n];
    return $o;
}
?>