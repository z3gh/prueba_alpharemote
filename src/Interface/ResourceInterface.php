<?php

namespace App\Interface;

/**
 * Interface ResourceInterface
 *
 * Representa un recurso (clase o examen).
 */
interface ResourceInterface
{
    public function getName(): string;
    public function getDetails(): string;
}
