# DMMapp Open Source

## Overview

**DMMapp Open Source is a simple-to-implement interactive map & web-application.**

![DMMapp_GitHub](https://user-images.githubusercontent.com/6100093/74037375-68422280-49be-11ea-851e-0e8593957950.gif)

It does three things:

- Allows admins to create and fill databases that can interact with Google Maps, creating interactive pins for every entry.
- Gives the final users a clear and fun way to interact with data.
- Guides developers in adapting the code for your own needs with a detailed Wiki and comments in the code.

To see it in action, please check out the [DMMapp website](https://digitizedmedievalmanuscripts.org/), and don't forget to check out the [DMMapp Open Source Wiki](https://digitizedmedievalmanuscripts.org/) to know more.

## Table of Contents

- [DMMapp Open Source](#dmmapp-open-source)
  - [Overview](#overview)
  - [Table of Contents](#table-of-contents)
    - [Requirements](#requirements)
    - [Quickstart](#quickstart)
    - [Contributing](#contributing)
    - [Questions and help](#questions-and-help)
    - [Acknowledgements](#acknowledgements)
    - [Copyright and license](#copyright-and-license)

### Requirements

The DMMapp Open Source is based on Laravel 6.x. As a consequence, your server must meet the following requirements:

- PHP >= 7.2.0
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

To use Google Maps:

- A valid Google Maps API key

### Quickstart

> **IMPORTANT:** this quickstart guide is meant for local development only. It will create a generic admin user that uses `admin@example.com` and `password`. **Do not use in production environments.**

Assuming you have [Composer](https://getcomposer.org/) installed on your machine:

```shell
git clone DMMappOpenSource https://github.com/SexyCodicology/DMMapp-Open-Source.git
cd DMMappOpenSource
composer install
```

- copy the contents of ".env.example" into ".env". If no ".env" is present, simply rename ".env.example" to ".env"

- (optional) Review the contents of the .env file and enter your Google API where requested.

  - Note: The application will still work if you do not enter the Google API key at this stage, but you will not be able to see the map and the pins.

```shell
php artisan key:generate
```

- create file "database.sqlite" in "DMMappOpenSource\database"

```php
php artisan migrate --seed
php artisan serve
```

A more detailed guide for setting up the app for both local and production environments is present in the [DMMapp Open Source Wiki](https://digitizedmedievalmanuscripts.org/).

### Contributing

The DMMapp Open Source is for everyone to modify and improve. We welcome  contributions and tips! Please check our Contributing page on the wiki. (coming soon)

### Questions and help

Check out the Talk to us page on our wiki, or head to the Sexy Codicology website to find all the channels where you can reach us.

### Acknowledgements

The DMMapp Open Source is based on, or makes use of:

- [Laravel 6.x](https://laravel.com/docs/6.x)
- [Bootstrap](https://getbootstrap.com/)
- [jQuery](https://jquery.com/)
- [FontAwesome](https://fontawesome.com/)

### Copyright and license

DMMapp Open Source is licensed under the MIT License:

> Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
>
> The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
>
> THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

Have fun!
