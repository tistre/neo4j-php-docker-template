<?php

// Usage:
// docker-compose exec --workdir /opt/app php php bin/example.php

use Bolt\Bolt;
use Bolt\connection\StreamSocket;
use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$logger = new Logger('neo4jPhpExample');
$logger->pushHandler(new ErrorLogHandler());

// Init Neo4j client

$bolt = new Bolt(new StreamSocket('neo4j'));
$bolt->setProtocolVersions(4.1);
$bolt->init('MyClient/1.0', 'neo4j', 'secret');

// Write some data

$bolt->begin();

$bolt->run(
    'CREATE (p:Person) SET p.name = $name',
    ['name' => 'Tim']
);

$bolt->commit();

// Read some data

$bolt->run('MATCH (p:Person) RETURN p LIMIT 10');

$rows = $bolt->pull();

var_dump($rows);
