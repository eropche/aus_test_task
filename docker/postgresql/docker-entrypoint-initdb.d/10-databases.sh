#!/bin/bash

create_database_ () {
psql --username=postgres <<-EOSQL
CREATE USER $1 WITH PASSWORD '$1';
CREATE DATABASE $1 WITH OWNER $1 TEMPLATE template0 LC_COLLATE 'ru_RU.UTF-8' LC_CTYPE 'ru_RU.UTF-8';
GRANT ALL PRIVILEGES ON DATABASE $1 TO $1;
EOSQL
}

### redproduct ###
create_database_ redproduct
