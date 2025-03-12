<?php

namespace App\Entity;

/**
 * Class Examen
 *
 * Representa un examen.
 */
class Examen extends AbstractResource
{
    private $tipoExamen;

    public function __construct(string $name, string $tipoExamen)
    {
        parent::__construct($name, 'Examen');
        $this->tipoExamen = $tipoExamen;
    }

    /**
     * Retorna los detalles del examen.
     *
     * @return string
     */
    public function getDetails(): string
    {
        return sprintf("%s: %s | %s", $this->getType(), $this->getName(), $this->tipoExamen);
    }
}
