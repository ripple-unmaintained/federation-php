<?php

function run()
{
  $data = json_decode(file_get_contents(dirname(__FILE__) . '/data.json'));

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  $result = array();

  if (!isset($_GET['domain']) || !strlen($_GET['domain'])) {
    send_error('invalidParams', 'No domain provided.');
  }

  $domain = $_GET['domain'];

  if (!isset($data->{$domain})) {
    send_error('noSuchDomain', 'The supplied domain is not served here.');
  }

  $users = $data->{$domain};

  if (!isset($_GET['user']) || !strlen($_GET['user'])) {
    send_error('invalidParams', 'No username provided.');
  }

  $user = $_GET['user'];

  if (!isset($users->{$user})) {
    send_error('noSuchUser', 'The supplied user was not found.');
  }

  $result['federation_json'] = array(
      'type' => 'federation_record',
      'user' => $user,
      'destination_address' => $users->{$user},
      'domain' => $domain
  );

  echo json_encode($result, JSON_PRETTY_PRINT);
  exit;
}

function send_error($errCode, $errMsg) {
  $result = array();

  $result['result'] = 'error';
  $result['error'] = $errCode;
  $result['error_message'] = $errMsg;

  echo json_encode($result, JSON_PRETTY_PRINT);
  exit;
}

run();
