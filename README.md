# neo4j-php / Bolt example (running in Docker)

A minimal, unofficial example for
* running Neo4j in a Docker container,
* running a PHP container with the [neo4j-php/Bolt](https://github.com/neo4j-php/Bolt) library installed,
* and using that library to access Neo4j.

## Installation

```
$ docker-compose up -d
$ docker-compose exec --workdir /opt/app php composer install
```

## Configuration

Copy the configuration file and edit it:

```
$ cp app/bin/config.dist.php app/bin/config.php
$ vi app/bin/config.php
```

## Running the example command line script

```
$ docker-compose exec --workdir /opt/app php php bin/example.php
```