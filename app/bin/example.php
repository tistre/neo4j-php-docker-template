<?php

// Usage:
// docker-compose exec --workdir /opt/app php php bin/example.php

require_once __DIR__ . '/init.php';

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
