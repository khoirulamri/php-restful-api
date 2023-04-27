<?php

require 'con.php';
require 'validate-token.php';

responseSuccess([
  'id' => $reqUser['id'],
  'name' => $reqUser['name'],
  'username' => $reqUser['username'],
  'address' => $reqUser['address'],
]);
