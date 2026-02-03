<?php

namespace PAPI\Mod\Dotenv;

use PAPI\Core\EventListener;
use PAPI\Core\EventOptions;
use PAPI\Core\EventType;
use Dotenv\Dotenv as VLucasDotenv;

class DotenvEvent extends EventListener
{
    public static function getType(): EventType
    {
        return EventType::BeforeBuild;
    }

    /**
     * @throws DotenvEventException
     */
    public function __invoke(EventOptions $options): void
    {
        if (defined("DOTENV_PATH") === false) {
            define("DOTENV_PATH", dirname(__DIR__, 4) . DIRECTORY_SEPARATOR . '.env');
        }

        if (file_exists(DOTENV_PATH)) {
            $info = pathinfo(DOTENV_PATH);
            VLucasDotenv::createImmutable($info["dirname"], $info["basename"])->load();
        } else {
            throw DotenvEventException::notFound(DOTENV_PATH);
        }
    }
}
