<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL | E_NOTICE);

//$fp = fopen('../users.csv', 'r');
//while (!feof($fp)) {
//    $data[] = fgetcsv($fp, 1024);
//}

//$data[] = [
//    'Dima 123',
//    '23',
//    48,
//    'Hello, "Dima"'
//];
//
//$fp = fopen('../usersNew.csv', 'w');
//foreach ($data as $elem) {
//    fputcsv($fp, $elem);
//}

$fp = fopen('../goods.csv', 'r');
$k = 0;
while (!feof($fp)) {
    $arr = fgetcsv($fp, 1024);
    if ($k > 0) {
        $data[] = $arr;
    }
    $k++;
}