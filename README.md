# php-base-translator

A simple and minimalistic base translator built with php and a few lines of javascript.

![preview](https://i.imgur.com/y9PN2p0.png)


## Installation


### Barebone

0x00 Download the project:
```
git clone https://github.com/Hamz-a/php-base-translator.git
```

0x01 Fetch dependencies:
```
composer install
```


### Docker compose
0x00 Download the project:
```
git clone https://github.com/Hamz-a/php-base-translator.git
```

0x01 Build the container
```
docker-compose build
```

0x02 Start it in background
```
docker-compose up -d
```


### Docker only
0x00 Download the project:
```
git clone https://github.com/Hamz-a/php-base-translator.git
```

0x01 Build the container
```
docker build -t php-base-translator .
```

0x02 Start it in background (port 80)
```
docker run -d -p 80:80 --name running-php-base-translator php-base-translator
```


## License

[MIT License](LICENSE)
