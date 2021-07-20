<?php

require_once 'constants.php';

class DatabaseHandler
{
  private $host = 'localhost';
  private $username = 'manuel';
  private $password = LOCAL_DATABASE_PASSWORD;
  private $databaseName = 'lab';

  function __construct()
  {
    if ($_SERVER['REMOTE_ADDR'] !== '::1') {
      $this->host = PROD_HOST;
      $this->username = PROD_USERNAME;
      $this->password = PROD_PASSWORD;
      $this->databaseName = PROD_DATABASE_NAME;
    }
  }

  function persistUser($user)
  {
    $connection = $this->getConnection();
    $query = "
      INSERT INTO data (full_name, id_card, email, exam_data) 
      VALUES ('$user->full_name', $user->id_card, '$user->email', '$user->exam_data')
    ";

    if ($connection->query($query)) {
      return 'User information persisted successfully.';
    }

    if ($connection->errno) {
      return 'Connection error';
    }

    $connection->close();
    return "Couldn't persist user.";
  }

  private function getConnection()
  {
    $connection = new mysqli(
      $this->host,
      $this->username,
      $this->password,
      $this->databaseName
    );

    if ($connection->connect_errno) {
      exit('Couldn\'t connect to the database.');
    }

    return $connection;
  }
}
