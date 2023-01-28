<?php declare(strict_types=1);

require_once(__DIR__ . '/util/DotEnvParser.php');
require_once(__DIR__ . '/../db/DatabaseBootstrap.php');

use library\util\DotEnvParser;
use db\DatabaseBootstrap;

DotEnvParser::parse(__DIR__ . '/../.env');
DatabaseBootstrap::bootstrap();