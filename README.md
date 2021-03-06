# WORDPRESS WEB

[![license](https://img.shields.io/github/license/mashape/apistatus.svg)]()

## Version

**v1.0.0**

## Dependencies

- php [https://php.net/](https://php.net/)
- wordpress: [https://wordpress.org/](https://wordpress.org/)
- docker: [https://www.docker.com/](https://www.docker.com/)
- mysql: [https://www.mysql.com/](https://www.mysql.com/)

## Demo

- web: [http://wordpressweb.jnpl.me/](http://wordpressweb.jnpl.me/)

## This create 2 new folders beside your docker-compose.yml file.

- **wp-data** - used to store and restore database dumps
- **wp-app** - the location of your wordpress application

## back-up data to wp-data

- `sudo bash export-database.sh`

## Installation

### start docker

- build docker image by running `docker-compose build`
- running docker image by running `docker-compose up`
- start docker image by running `docker-compose start`

- check docker inforation by running `docker-compose ps`
- identify the docker inforation by running `docker inspect <docker-name>`

### stop docker

- stop docker image by running `docker-compose stop`
- killing docker image by running `docker-compose kill`
- removing docker image by running `docker-compose rm`
- down docker image by running `docker-compose down --volumes`

### connect to mysql

- `docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' wordpress-web_wordpressdb_1`
- `mysql -uwordpress -p -h<ip-address>`

### explore docker filesystem

- `docker run -t -i wordpress-web_wordpress_1 /bin/bash`

### check docker information

- `docker inspect wordpress-web_wordpress_1 | grep "IPAddress"`
- `docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' wordpress-web_wordpress_1`
