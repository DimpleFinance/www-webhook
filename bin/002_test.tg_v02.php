#!/usr/bin/php
<?php

include "conf.php";
error_reporting(65535);

$txt = "Hello ".date("Y-m-d H:i:s");
$txt .= " [inline URL](https://google.com)";
$txt .= "<b>bold</b>, <strong>bold</strong>
<i>italic</i>, <em>italic</em>
<u>underline</u>, <ins>underline</ins>
<s>strikethrough</s>, <strike>strikethrough</strike>, <del>strikethrough</del>
<b>bold <i>italic bold <s>italic bold strikethrough</s> <u>underline italic bold</u></i> bold</b>
<a href=\"http://www.example.com/\">inline URL</a>
<a href=\"tg://user?id=123456789\">inline mention of a user</a>
<code>inline fixed-width code</code>
<pre>pre-formatted fixed-width code block</pre>
";

        unset($m);
        $m[txt] = $txt;
        send_msg($m);


?>