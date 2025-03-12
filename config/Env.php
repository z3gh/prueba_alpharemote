<?php

namespace App\Config;


/**
 * Class Env
 *
 * Carga las variables de entorno desde un archivo .env.
 */
class Env
{
    /**
     * Carga las variables de entorno desde el archivo especificado.
     *
     * @param string $file Ruta al archivo .env
     */
    public static function load(string $file): void
    {
        if (file_exists($file)) {
            $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) {
                    continue;
                }
                [$key, $value] = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                if (!empty($key)) {
                    $_ENV[$key] = $value;
                    putenv("$key=$value");
                }
            }
        }
    }
}
