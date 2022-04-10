# Lior Chamla OOP Tutorial

Lior Chamla OOP Tutorial website with docker, PHP, Apache, MySQL and phpmyadmin.


## Main Configuration

### Configure docker containers

In docker >> docker-compose.yml find replace test by project name and change all the port for web, db & phpmyadmin.


### Configure Xdebug

1. In PhpStorm go to: File | Settings | PHP | Debug, in Xdebug >> Debug port enter the port number (9010 for example).
2. Click on ADD Configurations (next phone symbole):
  - In left of pop-up window click on + and choose PHP Remote Debug;
  - Enter Name: Localhost (for example);
  - Check: Filter debug connection by IDE key;
  - In Server click in: ...;
  - In left off the pop-up window click on +;
  - Enter Localhost for Name (for example);
  - Enter Localhost for Host,
  - Enter the port number (check the web port in docker-compose);
  - Select Use path mappings;
  - in Project files >> got to your project root path >> next src enter: /var/www/html;
  - Click: Apply.
3. Download the [Xdebug helper](https://chrome.google.com/webstore/detail/xdebug-helper/eadndfjplgieldjbigjakmdgkmoaaaoc) (Google Chrome extension) and in options >> IDE key copy "PHPSTORM".
4. Back in Run/Debug Configuration in IDE key(session id) enter the copied IDE key (PHPSTORM) then click Apply.
5. In Menu >> Run >> select : Break at first line in PHP scripts.
6. Click on the phone symbole until it change to green and in browser click on Xdebug helper until it change to green also
7. Go to your home page website and click f5 to refresh.
8. Finally, in Run >> uncheck : Break at first line in PHP scripts.


## Main Tasks

To do ...


## Autoloading : c'est le responsable de charger les class automatique alor autrmodit c'est enpeche pas d'utilise require_once ou use dans le fichier 

## class application : 
avoire une class qui contient du controllerName et task pour avoire :
au lieu en url de http://localhost:81/index.php
en passe su http://localhost:81/index.php?controller=article&task=show&id=127

## patern singleton
  en a donne une istance sur class database en remplace $pdo par self::$instance 