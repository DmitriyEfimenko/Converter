Установка
------------

Скачать архив, распаковать и настроить Apache.

### Apache Setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName zf2-tutorial.localhost
        DocumentRoot /path/to/zf2-tutorial/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/zf2-tutorial/public>
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
что csv - плоская таблица, xml и json файлы должны выглядить так:

<windows>
    <window PartNumber="872-AA">
        <name>second_window</name>
        <width>600</width>
        <height>600</height>
    </window>

    <window PartNumber="872-AB">
        <name>first_window</name>
        <width>1900</width>
        <height>1200</height>
    </window>
</windows>

{
   "windows":
        {
            "window":
                [{
                    "_PartNumber":"872-AA",
                    "name":"аываыва",
                    "width":"600",
                    "height":"600"
                 },
                 {
                    "_PartNumber":"872-AB",
                    "name":"first_window",
                    "width":"1900",
                    "height":"1200"
                 }]
        }
   }

Тоесть без какой либо вложенности или разных элементов.

От себя
----------------
Попытался создать универсальную легко дополняему и легко поддерживаему конструкцию, но в силу наличия CSV файла,
сама реализация может показаться не совсем простой.


