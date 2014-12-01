<?php

$isMailTrap = false;

// mailtrap
$mailTrapHost               = 'mailtrap.io';
$mailTrapConnectionClass    = 'login';
$mailTrapPort               = 465;
$mailTrapUsername           = getenv('MAILTRAP_USERNAME');
$mailTrapPassword           = getenv('MAILTRAP_PASSWORD');

// mandrill
$mandrillHost               = 'smtp.mandrillapp.com';
$mandrillConnectionClass    = 'login';
$mandrillPort               = 587;
$mandrillUsername           = getenv('MANDRILL_USERNAME');
$mandrillApikey             = getenv('MANDRILL_APIKEY');

$host                       = $isMailTrap ? $mailTrapHost : $mandrillHost;
$connectionClass            = $isMailTrap ? $mailTrapConnectionClass : $mandrillConnectionClass;
$port                       = $isMailTrap ? $mailTrapPort : $mandrillPort;
$username                   = $isMailTrap ? $mailTrapUsername : $mandrillUsername;
$password                   = $isMailTrap ? $mailTrapPassword : $mandrillApikey;

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