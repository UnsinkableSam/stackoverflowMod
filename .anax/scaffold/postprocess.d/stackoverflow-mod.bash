#!/usr/bin/env bash
#
# anax/remserver
#
# Integrate the REM server onto an existing anax installation.
#

# Copy the configuration files
rsync -av vendor/samax/stackoverflow-mod/config ./
rsync -av vendor/samax/stackoverflow-mod/data ./
rsync -av vendor/samax/stackoverflow-mod/view ./
rsync -av vendor/samax/stackoverflow-mod/src ./
rsync -av vendor/samax/stackoverflow-mod/theme ./




# Copy the documentation
#rsync -av vendor/anax/remserver/content/index.md ./content/remserver-api.md