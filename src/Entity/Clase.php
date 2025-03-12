<?php

namespace App\Entity;

class Clase extends AbstractResource
{
    private $ponderacion;

    public function __construct(string $name, int $ponderacion)
    {
        parent::__construct($name, 'Clase');
        $this->ponderacion = $ponderacion;
    }

    public function getDetails(): string
    {
        return sprintf("%s: %s | %d/5", $this->getType(), $this->getName(), $this->ponderacion);
    }
}
