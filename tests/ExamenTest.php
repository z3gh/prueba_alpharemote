<?php

use App\Entity\Examen;
use PHPUnit\Framework\TestCase;

class ExamenTest extends TestCase
{
    public function testGetDetails()
    {
        // Se crea una instancia de Examen con nombre "Test Examen" y tipo "selección"
        $examen = new Examen("Test Examen", "selección");
        
        // Se espera que el método getDetails retorne el siguiente string
        $expected = "Examen: Test Examen | selección";
        
        $this->assertEquals($expected, $examen->getDetails());
    }
}
