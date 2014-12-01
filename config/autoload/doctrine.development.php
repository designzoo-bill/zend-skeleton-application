<?php

// get the db details from Env Vars on server - this is good for security
$host         = getenv('DB_HOST');
$user         = getenv('DB_USER');
$DB_PASSWORD  = getenv('DB_PASSWORD');
$dbname       = getenv('DB_NAME');

return array(
  'doctrine' => array(
    'connection' => array(
      'orm_default' => array(
        'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
        'params' => array(
          'host'     => $host,
          'user'     => $user,
          'password' => $password,
          'dbname'   => $dbname,
        )
      )
    )
  )
);