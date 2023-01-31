<?php declare(strict_types=1);

require_once(ROOT . DS . 'util' . DS . 'DotEnvParser.php');
require_once(ROOT . DS . 'db' . DS . 'DatabaseBootstrap.php');

DotEnvParser::parse(__DIR__ . '/../.env');
DatabaseBootstrap::bootstrap();