<?php

$token = $_SERVER['HTTP_AUTHORIZATION'];
$result = $mysqli->query("
  select users.id, users.name, users.username, users.address from access_tokens
  inner join users on users.id = access_tokens.user_id
  where access_tokens.token='$token' and access_tokens.expired_at > now()
  limit 1
");
$reqUser = $result->fetch_assoc();
if (!$reqUser) {
  responseError('Unauthorize', 403);
}
