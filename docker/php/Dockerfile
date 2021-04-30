FROM php:7.4-fpm

# Install "sockets" extension for Neo4j Bolt
RUN docker-php-ext-install sockets

# Install "zip" extension for Composer installs
RUN apt-get update && apt-get install -y libzip-dev \
    && docker-php-ext-install zip

# git and unzip for Composer installs
RUN apt-get update && apt-get install -y \
		git ssh unzip \
	--no-install-recommends && rm -r /var/lib/apt/lists/*

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
