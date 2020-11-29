<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL | E_NOTICE);

$xml = new SimpleXMLElement(file_get_contents('../users.xml'));

echo '<pre>';

foreach ($xml->users->user as $user) {
    echo "user id#{$user->id}, name: " . $user->name . '<br>';
    echo 'profile:<br>';
    foreach ($user->profile as $profile) {
        echo $profile->attributes()['field'] . ':';
        echo $profile . '<br>';
    }
}

$user = $xml->users->addChild('user');
$user->addChild('id', 15)->addChild('name', 'Marina');


$xml->asXML('../newUsers2.xml');