<?php

use App\Console\SearchCommand;
use App\Entity\Clase;
use App\Entity\Examen;
use PHPUnit\Framework\TestCase;

// Repositorio simulado para pruebas, sin acceso a la base de datos
class FakeResourceRepository {
    public function search(string $term): array {
       if ($term === 'test') {
         return [
            new Clase("Clase de prueba", 4),
            new Examen("Examen de prueba", "selección")
         ];
       }
       return [];
    }
}

class SearchCommandTest extends TestCase
{
    public function testExecuteWithResults() {
        // Inyecta el FakeResourceRepository
        $fakeRepo = new FakeResourceRepository();
        $command = new SearchCommand($fakeRepo);

        ob_start();
        $command->execute("test");
        $output = ob_get_clean();

        $expectedClase = "Clase: Clase de prueba | 4/5";
        $expectedExamen = "Examen: Examen de prueba | selección";

        $this->assertStringContainsString($expectedClase, $output);
        $this->assertStringContainsString($expectedExamen, $output);
    }

    public function testExecuteWithoutResults() {
        $fakeRepo = new FakeResourceRepository();
        $command = new SearchCommand($fakeRepo);

        ob_start();
        $command->execute("unknown");
        $output = ob_get_clean();

        $this->assertStringContainsString("No se encontraron resultados para 'unknown'.", $output);
    }
}