<?php

$rootpath = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
$filepath = str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']);
$headpath = $_SERVER['HTTP_HOST'];

if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
{
    $ssl = 'https';
} else {
    $ssl = 'http';
}
$app_url = ($ssl  )
    . "://".$_SERVER['HTTP_HOST']
    . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
    . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");

$project_name = trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");
