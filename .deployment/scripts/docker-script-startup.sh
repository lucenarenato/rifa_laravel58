#!/bin/bash

if [ "$SUPERVISOR" == "True" ]; then
	mv /root/scripts/supervisord-worker.conf /etc/supervisor/conf.d/supervisord.conf
	supervisord
else
	crontab -r
	mv /root/scripts/supervisord-api.conf /etc/supervisor/conf.d/supervisord.conf
	(
		crontab -l 2>/dev/null
		echo "* * * * * chmod -R 777 /var/www/html/storage/logs/"
	) | crontab -
	supervisord
fi
