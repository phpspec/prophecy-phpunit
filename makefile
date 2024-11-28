phar:
	mkdir build;
	cp -r src build/src;
	cp -r vendor build;
	rm -r build/vendor/phpspec;
	cp manifest.xml build/manifest.xml;
	cp LICENSE build/LICENSE
	php -dphar.readonly=0 ./tools/phpab --phar -o ./build/prophecy-phpunit.phar --all --hash SHA-1 ./build

clean:
	rm -r build
