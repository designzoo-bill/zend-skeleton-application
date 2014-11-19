<?php

// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/module/Application/src/Application/Entity"), $isDevMode);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

$conn = array(
    'driver'	=> 'pdo_mysql',
    'host'		=> '127.0.0.1',
    'user'		=> 'root',
    'password'	=> 'design5972',
    'dbname'	=> 'zf2',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);