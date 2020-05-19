#!/usr/bin/env bash
#
# anax/remserver
#
# Integrate the REM server onto an existing anax installation.
#
#this is a new file.
# Copy the configuration files
rsync -av vendor/samax/stackoverflowMod/config ./
rsync -av vendor/samax/stackoverflowMod/data ./
rsync -av vendor/samax/stackoverflowMod/sql ./

rsync -av vendor/samax/stackoverflowMod/view ./
rsync -av vendor/samax/stackoverflowMod/src ./
rsync -av vendor/samax/stackoverflowMod/theme ./

sqlite3 vendor/samax/stackoverflowMod/data/db.sqlite < vendor/samax/stackoverflowMod/sql/ddl/user_sqlite.sql
sqlite3 vendor/samax/stackoverflowMod/data/db.sqlite < vendor/samax/stackoverflowMod/sql/ddl/comments_sqlite.sql
sqlite3 vendor/samax/stackoverflowMod/data/db.sqlite < vendor/samax/stackoverflowMod/sql/ddl/questions_sqlite.sql
sqlite3 vendor/samax/stackoverflowMod/data/db.sqlite < vendor/samax/stackoverflowMod/sql/ddl/answers_sqlite.sql

chmod 777 data