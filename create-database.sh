#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS rifa;
    GRANT ALL PRIVILEGES ON \`rifa%\`.* TO '$MYSQL_USER'@'%';

EOSQL
