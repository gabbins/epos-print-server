<?php
require_once __DIR__ . '/vendor/autoload.php';
$response = 'Invalid Request';

if (empty($_POST['frmBtn']) || !in_array($_POST['frmBtn'], ['start']))
  die(respError($response));

$button = $_POST['frmBtn'];

switch ($button) {
  case 'start':
    start_websocket();
    break;
}



function start_websocket()
{
  try {
    $response = 'Socket server started successfully';
    $response = exec('php server.php &');

    $response = !empty($response) ? $response : 'Something went wrong';
    echo respSuccess($response);
  } catch (\Throwable $th) {
    echo respError($th->getMessage());
  }
}


function respSuccess(string $response): string
{
  return "~~~1~~~$response~~~";
}


function respError(string $response): string
{
  return "~~~0~~~$response~~~";
}