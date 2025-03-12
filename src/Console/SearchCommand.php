<?php

namespace App\Console;

use App\Repository\ResourceRepository;
use App\Interface\CommandInterface;

class SearchCommand implements CommandInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ResourceRepository();
    }

    public function execute(string $term): void
    {
        try {
            $resources = $this->repository->search($term);
            if (empty($resources)) {
                echo "No se encontraron resultados para '$term'.\n";
                return;
            }
            foreach ($resources as $resource) {
                echo $resource->getDetails() . "\n";
            }
        } catch (\InvalidArgumentException $e) {
            echo "Error: " . $e->getMessage() . "\n";
        } catch (\Exception $e) {
            echo "Ocurrió un error: " . $e->getMessage() . "\n";
        }
    }
}
