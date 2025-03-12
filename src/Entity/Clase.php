<?php

namespace App\Entity;

/**
 * Class Clase
 *
 * Representa una clase de curso.
 */
class Clase extends AbstractResource
{
    private $ponderacion;

    public function __construct(string $name, int $ponderacion)
    {
        parent::__construct($name, 'Clase');
        $this->ponderacion = $ponderacion;
    }

    /**
     * Retorna los detalles de la clase.
     *
     * @return string
     */
    public function getDetails(): string
    {
        return sprintf("%s: %s | %d/5", $this->getType(), $this->getName(), $this->ponderacion);
    }
}
