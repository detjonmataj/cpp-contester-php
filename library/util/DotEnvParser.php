<?php declare(strict_types=1);

namespace library\util;

use InvalidArgumentException;
use RuntimeException;

class DotEnvParser
{
    public static function parse(string $path)
    {
        if (!file_exists($path)) {
            throw new InvalidArgumentException(sprintf('%s does not exist', $path));
        }

        if (!is_readable($path)) {
            throw new RuntimeException(sprintf('%s file is not readable', $path));
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (str_starts_with(trim($line), '#')) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                $_ENV[$name] = $value;
            }
        }
    }
}