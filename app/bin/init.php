<?php

use Bolt\Bolt;
use Bolt\connection\StreamSocket;
use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger;

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

$logger = new Logger(LOGGER_NAME);
$logger->pushHandler(new ErrorLogHandler());

// Init Neo4j client

$bolt = new Bolt(new StreamSocket(NEO4J_HOST));
$bolt->setProtocolVersions(NEO4J_PROTOCOL_VERSION);
$bolt->init(NEO4J_CLIENT_NAME, NEO4J_USER, NEO4J_PASSWORD);
