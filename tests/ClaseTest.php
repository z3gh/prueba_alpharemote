<?php

use App\Entity\Clase;
use PHPUnit\Framework\TestCase;

class ClaseTest extends TestCase
{
    public function testGetDetails()
    {
        // Se crea una instancia de Clase con nombre "Test Clase" y ponderación 5
        $clase = new Clase("Test Clase", 5);
        
        // Se espera que el método getDetails retorne el siguiente string
        $expected = "Clase: Test Clase | 5/5";
        
        $this->assertEquals($expected, $clase->getDetails());
    }
}
