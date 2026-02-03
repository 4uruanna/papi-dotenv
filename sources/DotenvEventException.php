<?php

namespace PAPI\Mod\Dotenv;

use Exception;

class DotenvEventException extends Exception
{
    public static function notFound(string $path): static
    {
        return new static("'$path' not found'");
    }
}
