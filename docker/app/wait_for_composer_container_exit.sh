#!/usr/bin/env ash

while ping -c1 composer &>/dev/null; do
    echo "waiting for composer-install done..."
    sleep 5
done
