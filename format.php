<?php
Echo $Content1 = <<<CONTENT1
{"enabled":true,"name":"
CONTENT1;

Echo $array['Name'];

Echo $Content2 = <<<CONTENT2
","pattern":"*://*
CONTENT2;

Echo $array['Domain']; 

Echo ".";

Echo $array['Tld'];

Echo $Content3 = <<<CONTENT3
/*","isRegEx":false,"caseSensitive":false,"blackList":false,"multiLine":false}
CONTENT3;
?>
