<?php

namespace App\Entity;

use App\Interface\ResourceInterface;

/**
 * Class AbstractResource
 *
 * Implementa métodos comunes para ambos recursos.
 */
abstract class AbstractResource implements ResourceInterface
{
    protected $name;
    protected $type;

    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Retorna el nombre del recurso.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Retorna el tipo de recurso.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
