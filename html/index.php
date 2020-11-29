<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL | E_NOTICE);

$xml = new SimpleXMLElement(file_get_contents('../users.xml'));

echo 123;

var_dump($xml);