deploy: 
	cp -r www/* /var/www/

full-deploy: clean config restart db deploy
	
config: PHONY
	cp config/somesite.conf /etc/apache2/sites-enabled/.

db: PHONY
	mysql -u root -proot < db/setup_tables.sql
	
restart:
	service apache2 restart
clean: 
	rm -f -r /var/www/*
	rm -f /etc/apache2/sites-enabled/somesite.conf


PHONY: