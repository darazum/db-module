<?php
try {
    $pdo = new PDO("mysql:host=mysql;dbname=loftschool", 'loftschool', 'loftschool');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}

// ** получение пользователя по id
//$id = intval($_GET['id'] ?? 0); // эквивалентно $id = isset($_GET['id']) ? $_GET['id'] : 0;
//if ($id) {
//    $ret = $pdo->query("SELECT * FROM users WHERE id = $id");
//    // SQL INJECTION // ?id=123 UNION SELECT * FROM users; / ;DELETE FROM users
//
//    if (!$ret) { // проверяем на успешность
//        print_r($pdo->errorInfo()); die;
//    }
//
//    $user = $ret->fetchAll(PDO::FETCH_ASSOC);
//     echo '<pre>' . print_r($user, 1) . '</pre>';
//}


// ** получение пользователя по имени
$name = $_GET['name'] ?? '';
//
//if ($name) {
//    $ret = $pdo->query("SELECT * FROM users WHERE `name` = '$name'");
//    $user = $ret->fetchAll(PDO::FETCH_ASSOC);
//    echo '<pre>' . print_r($user, 1) . '</pre>';
//}

// ** безопасный вариант
if ($name) {
    $query = $pdo->prepare("SELECT * FROM users WHERE `name` = :user_name");
    $ret = $query->execute(['user_name' => $name]);
    $user = $query->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>' . print_r($user, 1) . '</pre>';
}