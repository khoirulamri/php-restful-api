<?php

include 'con.php';

$data = json_decode(file_get_contents("php://input"), TRUE);

$username = $mysqli->real_escape_string($data['username']);
$password = md5($mysqli->real_escape_string($data['password']));

$result = $mysqli->query("select id,name,username from users where username='$username' and password='$password' limit 1");
$user = $result->fetch_assoc();

if (is_null($user)) {
  responseError('username and password not match');
}

$token = md5(uniqid($user['id']));
$expired = date('Y-m-d H:i:s', strtotime('+1 days'));
$userId = $user['id'];

$res = $mysqli->query("insert into access_tokens values(null,'$token','$expired',$userId)");
if (!$res) {
  responseError($mysqli->error);
}

responseSuccess([
  'id' => $user['id'],
  'name' => $user['name'],
  'username' => $user['username'],
  'token' => $token,
  'expiredAt' => $expired,
]);
