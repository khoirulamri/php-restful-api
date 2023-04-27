<?php

ini_set('display_errors', 0);
include 'helper.php';

$mysqli = new mysqli("localhost","root","dev","lks");

// Check connection
if ($mysqli->connect_errno) {
  responseError($mysqli->connect_error);
}
