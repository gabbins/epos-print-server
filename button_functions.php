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
  // case 'stop':
  //   stop_websocket();
  //   break;
  // case 'status':
  //   check_websocket_status();
  //   break;
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


// function stop_websocket()
// {
//   try {
//     $response = 'Websocket closed successfully';
//     echo respSuccess($response);
//   } catch (\Throwable $th) {
//     echo respError($th->getMessage());
//   }
// }


// function check_websocket_status()
// {
//   try {
//     $response = 'test response';
//     echo respSuccess($response);
//   } catch (\Throwable $th) {
//     echo respError($th->getMessage());
//   }
// }


function respSuccess(string $response): string
{
  return "~~~1~~~$response~~~";
}


function respError(string $response): string
{
  return "~~~0~~~$response~~~";
}