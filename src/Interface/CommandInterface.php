<?php

namespace App\Interface;

/**
 * Interface CommandInterface
 *
 * Define la estructura para un comando en consola.
 */
interface CommandInterface
{
    /**
     * Ejecuta el comando.
     *
     * @param mixed $argument
     */
    public function execute(string $argument): void;
}
