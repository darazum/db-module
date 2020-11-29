<?php
include '../../class.db.php';
$db = Db::getInstance();
$id = $_GET['id'] ?? 0;
$q = "SELECT * FROM users WHERE id = :id";
$db = Db::getInstance();
$ret = $db->fetchOne($q, ['id' => $id], __FILE__);

header('Content-type: application/json');
echo json_encode($ret);