--TEST--
bzcompress()/bzdecompress() tests
--EXTENSIONS--
bz2
--FILE--
<?php

$string = "Life it seems, will fade away
Drifting further everyday
Getting lost within myself
Nothing matters no one else";

var_dump(bzcompress(1,1,1));

$data = bzcompress($string);
$data2 = bzcompress($string, 1, 10);

$data3 = $data2;
$data3[3] = 0;

var_dump(bzdecompress(1, true));
var_dump(bzdecompress($data3));
var_dump(bzdecompress($data3, true));

var_dump(bzdecompress($data, false));
var_dump(bzdecompress($data, true));
var_dump(bzdecompress($data));
var_dump(bzdecompress($data2));

echo "Done\n";
?>
--EXPECTF--
string(%d) "BZ%a"
int(-5)
int(-5)
int(-5)
string(110) "Life it seems, will fade away
Drifting further everyday
Getting lost within myself
Nothing matters no one else"
string(110) "Life it seems, will fade away
Drifting further everyday
Getting lost within myself
Nothing matters no one else"
string(110) "Life it seems, will fade away
Drifting further everyday
Getting lost within myself
Nothing matters no one else"
string(110) "Life it seems, will fade away
Drifting further everyday
Getting lost within myself
Nothing matters no one else"
Done
