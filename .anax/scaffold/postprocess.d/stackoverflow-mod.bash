#!/usr/bin/env bash
#
# anax/remserver
#
# Integrate the REM server onto an existing anax installation.
#

# Copy the configuration files
rsync -av vendor/samax/stackoverflow-mod/config ./
rsync -av vendor/samax/stackoverflow-mod/data ./
rsync -av vendor/samax/stackoverflow-mod/sql ./

rsync -av vendor/samax/stackoverflow-mod/view ./
# rsync -av vendor/samax/stackoverflow-mod/src ./
# rsync -av vendor/samax/stackoverflow-mod/theme ./

sqlite3 vendor/samax/stackoverflow-mod/data/db.sqlite < vendor/samax/stackoverflow-mod/sql/ddl/user_sqlite.sql
sqlite3 vendor/samax/stackoverflow-mod/data/db.sqlite < vendor/samax/stackoverflow-mod/sql/ddl/comments_sqlite.sql
sqlite3 vendor/samax/stackoverflow-mod/data/db.sqlite < vendor/samax/stackoverflow-mod/sql/ddl/questions_sqlite.sql
sqlite3 vendor/samax/stackoverflow-mod/data/db.sqlite < vendor/samax/stackoverflow-mod/sql/ddl/answers_sqlite.sql

chmod 777 data


# Copy the documentation
#rsync -av vendor/anax/remserver/content/index.md ./content/remserver-api.md#!/usr/bin/env bash
#
# anax/remserver
#
# Integrate the REM server onto an existing anax installation.
#

# Copy the configuration files
rsync -av vendor/samax/stackoverflow-mod/config ./
rsync -av vendor/samax/stackoverflow-mod/data ./
rsync -av vendor/samax/stackoverflow-mod/sql ./

rsync -av vendor/samax/stackoverflow-mod/view ./
# rsync -av vendor/samax/stackoverflow-mod/src ./
# rsync -av vendor/samax/stackoverflow-mod/theme ./

sqlite3 vendor/samax/stackoverflow-mod/data/db.sqlite < vendor/samax/stackoverflow-mod/sql/ddl/user_sqlite.sql
sqlite3 vendor/samax/stackoverflow-mod/data/db.sqlite < vendor/samax/stackoverflow-mod/sql/ddl/comments_sqlite.sql
sqlite3 vendor/samax/stackoverflow-mod/data/db.sqlite < vendor/samax/stackoverflow-mod/sql/ddl/questions_sqlite.sql
sqlite3 vendor/samax/stackoverflow-mod/data/db.sqlite < vendor/samax/stackoverflow-mod/sql/ddl/answers_sqlite.sql

chmod 777 data


# Copy the documentation
#rsync -av vendor/anax/remserver/content/index.md ./content/remserver-api.md#!/usr/bin/env bash
#
# anax/remserver
#
# Integrate the REM server onto an existing anax installation.
#

# Copy the configuration files
rsync -av vendor/samax/stackoverflow-mod/config ./
rsync -av vendor/samax/stackoverflow-mod/data ./
rsync -av vendor/samax/stackoverflow-mod/sql ./

rsync -av vendor/samax/stackoverflow-mod/view ./
# rsync -av vendor/samax/stackoverflow-mod/src ./
# rsync -av vendor/samax/stackoverflow-mod/theme ./

sqlite3 vendor/samax/stackoverflow-mod/data/db.sqlite < vendor/samax/stackoverflow-mod/sql/ddl/user_sqlite.sql
sqlite3 vendor/samax/stackoverflow-mod/data/db.sqlite < vendor/samax/stackoverflow-mod/sql/ddl/comments_sqlite.sql
sqlite3 vendor/samax/stackoverflow-mod/data/db.sqlite < vendor/samax/stackoverflow-mod/sql/ddl/questions_sqlite.sql
sqlite3 vendor/samax/stackoverflow-mod/data/db.sqlite < vendor/samax/stackoverflow-mod/sql/ddl/answers_sqlite.sql

chmod 777 data


# Copy the documentation
#rsync -av vendor/anax/remserver/content/index.md ./content/remserver-api.md