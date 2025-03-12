<?php

namespace App\Entity;

class Examen extends AbstractResource
{
    private $tipoExamen;

    public function __construct(string $name, string $tipoExamen)
    {
        parent::__construct($name, 'Examen');
        $this->tipoExamen = $tipoExamen;
    }

    public function getDetails(): string
    {
        return sprintf("%s: %s | %s", $this->getType(), $this->getName(), $this->tipoExamen);
    }
}
