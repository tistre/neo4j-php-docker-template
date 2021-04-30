# neo4j-php-example
Example, minimal dockerized Neo4j + PHP client project

## Installation

```
$ docker-compose up -d
$ docker-compose exec --workdir /opt/app php composer install
```

## Running a command line script

```
$ docker-compose exec --workdir /opt/app php php bin/example.php
```