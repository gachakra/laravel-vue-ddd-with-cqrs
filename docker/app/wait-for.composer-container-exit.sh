#!/usr/bin/env ash

while ping -c1 composer &>/dev/null; do
    echo "Waiting for composer-install done..."
    sleep 7
done