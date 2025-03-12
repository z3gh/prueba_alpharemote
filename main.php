<?php

require_once __DIR__ . '/config/Env.php';
\App\Config\Env::load(__DIR__ . '/.env');

require_once __DIR__ . '/vendor/autoload.php';

use App\Console\SearchCommand;

if ($argc < 3) {
    echo "Uso: php main.php search <término>\n";
    exit(1);
}

$command = $argv[1];
$term = $argv[2];

if ($command === 'search') {
    $searchCommand = new SearchCommand();
    $searchCommand->execute($term);
} else {
    echo "Comando no reconocido.\n";
    exit(1);
}
