<?php

namespace App\Repository;

use App\Database\DatabaseConnection;
use App\Entity\Clase;
use App\Entity\Examen;
// use App\Entity\ResourceInterface;

class ResourceRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::getInstance()->getConnection();
    }

    public function search(string $term): array
    {
        $term = trim($term);
        if (strlen($term) < 3) {
            throw new \InvalidArgumentException("El término debe tener al menos 3 caracteres.");
        }

        $sql = "
            SELECT 
                r.tipo, 
                r.nombre, 
                c.ponderacion, 
                e.tipo_examen
            FROM resources r
            LEFT JOIN clases c ON r.id = c.resource_id
            LEFT JOIN examenes e ON r.id = e.resource_id
            WHERE r.nombre LIKE :term
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['term' => '%' . $term . '%']);
        $results = $stmt->fetchAll();

        $resources = [];
        foreach ($results as $row) {
            if ($row['tipo'] === 'clase') {
                $resources[] = new Clase($row['nombre'], (int)$row['ponderacion']);
            } elseif ($row['tipo'] === 'examen') {
                $resources[] = new Examen($row['nombre'], $row['tipo_examen']);
            }
        }

        return $resources;
    }
}
