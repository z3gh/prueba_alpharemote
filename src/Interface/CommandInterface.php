<?php

namespace App\Interface;

interface CommandInterface
{
    public function execute(string $argument): void;
}
