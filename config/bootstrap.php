<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Configurações do Doctrine
$paths = [__DIR__ . '/../src'];
$isDevMode = true;

// Importa a variavel $dbParams, com os parametros do banco
require __DIR__."\bd_config.php";

extract($dbParams);


// Configuração sem cache
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create([
    'driver'   => $driver,
    'user'     => $user,
    'password' => $password, 
    'dbname'   => $dbname
], $config);