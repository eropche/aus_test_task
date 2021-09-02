#!/bin/bash

### test ###
psql --username=postgres --dbname=test <<-EOSQL
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
EOSQL
