<?php

return array(
  'doctrine' => array(
    'connection' => array(
      'orm_default' => array(
        'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
        'params' => array(
          'host'     => 'us-cdbr-iron-east-01.cleardb.net',
          'user'     => 'b709c791c0e243',
          'password' => '2bab4a84',
          'dbname'   => 'heroku_d609a9367feb337',
        )
      )
    )
  )
);