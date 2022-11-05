<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Methods: POST, GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-REquested-With, X-Auth-User");
// ini_set('display_errors', '0');
date_default_timezone_set("Asia/Manila");
set_time_limit(1000);
