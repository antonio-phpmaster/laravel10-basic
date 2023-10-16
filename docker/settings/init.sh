#!/bin/bash
service apache2 reload
echo "127.0.0.1	laravel10-basic.test" >> /etc/hosts
wait