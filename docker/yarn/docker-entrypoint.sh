#!/usr/bin/env ash
# Based on https://github.com/composer/docker/blob/master/docker-entrypoint.sh

isCommand() {
  # Retain backwards compatibility with common CI providers,
  if [ "$1" == "ash" ]; then
    return 1
  fi

  yarn help $1 > /dev/null 2>&1
}

# check if the first argument passed in looks like a flag
if [ "${1#-}" != "$1" ]; then
  set -- /sbin/tini -- yarn "$@"
# check if the first argument passed in is yarn
elif [ "$1" = 'yarn' ]; then
  set -- /sbin/tini -- "$@"
# check if the first argument passed in matches a known command
elif isCommand "$1"; then
  set -- /sbin/tini -- yarn "$@"
fi

exec "$@"
