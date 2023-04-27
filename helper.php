<?php

function responseError($message, $errorCode = 400) {
  header('Content-Type: application/json; charset=utf-8');
  http_response_code($errorCode);
  echo json_encode([
    'message' => $message
  ]);
  exit();
}

function responseSuccess($data) {
  header('Content-Type: application/json; charset=utf-8');
  http_response_code(200);
  echo json_encode($data);
  exit();
}
