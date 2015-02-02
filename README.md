Установка
------------

Скачать архив, распаковать и настроить Apache.

### Apache Setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName converter.localhost
        DocumentRoot /path/to/converter/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/converter/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>


Кратко о проекте
-----------------
Проект поддерживает любые манипуляции json->xml, xml->json.

Но в связи с тем,
что csv - плоская таблица, xml и json файлы должны быть без какой либо вложенности или разных элементов.

От себя
----------------
Попытался создать универсальную легко дополняему и легко поддерживаему конструкцию, но в силу наличия CSV файла,
сама реализация может показаться не совсем простой.


