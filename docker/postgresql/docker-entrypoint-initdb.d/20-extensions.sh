#!/bin/bash

### redproduct ###
psql --username=postgres --dbname=redproduct <<-EOSQL
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
EOSQL
