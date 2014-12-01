<?php

$isMailTrap = true;

// mailtrap
$mailTrapHost               = 'mailtrap.io';
$mailTrapConnectionClass    = 'login';
$mailTrapPort               = 465;
$mailTrapUsername           = '2600189c78ecf24bd';
$mailTrapPassword           = 'ffe778660e905d';

// mandrill
$mandrillHost               = 'smtp.mandrillapp.com';
$mandrillConnectionClass    = 'login';
$mandrillPort               = 587;
$mandrillUsername           = 'app31774676@heroku.com';
$mandrillPassword           = 'w_pi4LPg1MGYhp5YwRyPCw';

$host                       = $isMailTrap ? $mailTrapHost : $mandrillHost;
$connectionClass            = $isMailTrap ? $mailTrapConnectionClass : $mandrillConnectionClass;
$port                       = $isMailTrap ? $mailTrapPort : $mandrillPort;
$username                   = $isMailTrap ? $mailTrapUsername : $mandrillUsername;
$password                   = $isMailTrap ? $mailTrapPassword : $mandrillPassword;

return array(
    'mail' => array(
        'transport' => array(
            'options' => array(
                'host'              => $host,
                'connection_class'  => $connectionClass,
                'port'              => $port,
                'connection_config' => array(
                    'username' => $username,
                    'password' => $password,
                ),
            ),  
        ),
    ),
);