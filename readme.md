# PAPI/Dotenv

![]( https://img.shields.io/badge/php->=8.5-fff?style=flat-square&logo=php&logoColor=fff&labelColor=777BB4)
![]( https://img.shields.io/badge/composer->=2-fff?style=flat-square&logo=composer&logoColor=fff&labelColor=885630)

#### [PACKAGIST]() \| [GITHUB](https://github.com/4uruanna/papi-core)
## Description

Load environment (`.env`) when building your [PAPI](https://github.com/4uruanna/papi-core).
This module uses [gitvlucas/phpdotenv](https://github.com/vlucas/phpdotenv) under the hood.

## Configuration

### Constants

| Name           | Required  |  Type   | Default  | Description                                      |       
|:---------------|:---------:|:-------:|:---------|:-------------------------------------------------|
| `DOTENV_PATH`  |    No     | String  | `".env"` | Directory where the .env file to load is located |

## Usage

> `DotenvEvent` is called during `BeforeBuild` event.
We recommend putting it first to avoid any mistakes.
```php
use PAPI\Core\SlimBuilder;
use PAPI\Mod\Dotenv\DotenvEvent;

define("DOTENV_PATH", __DIR__ . DIRECTORY_SEPARATOR . ".env");

$builder = new SlimBuilder();

$builder
    ->addEvent(DotenvEvent::class)
    ->build()
    ->run();
```

a