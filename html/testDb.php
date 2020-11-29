<?php
include '../class.db.php';

$q = "INSERT INTO users (`name`, about, gender, birthday, city)
                                VALUES (:name, 'I am Jacky and i know it', 1, '2000-01-02', 123);";
$db = Db::getInstance();
$ret = $db->exec($q, [':name' => 'Dmitriy'], __FILE__);


$id = $_GET['id'] ?? 0;
$q = "SELECT * FROM users WHERE id = :id";
$db = Db::getInstance();
$ret = $db->fetchOne($q, ['id' => $id], __FILE__);
var_dump($ret);
var_dump($db->lastInsertId());
var_dump($db->getLog());