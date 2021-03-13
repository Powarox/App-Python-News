<?php


$data = json_encode('test');
// $data = 'test';

$output1 = shell_exec("python3 test.py $data");

var_dump($output1);


exec("python3 test.py $data", $output, $retval);

var_dump($output);
var_dump($retval);
