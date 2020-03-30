#!/usr/bin/env ash

container=$1
count=0
while ping -c1 "$container" &>/dev/null; do
    if [[ "$count" -eq 10 ]]; then
        count=0
    fi
    if [[ "$count" -eq 0 ]]; then
        echo "Waiting for $container container work done..."
    fi

    count=$(expr ${count} + 1)
    sleep 5
done
