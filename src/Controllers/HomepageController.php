<?php
declare(strict_types=1);

namespace Viktorija\Atsiskaitymas\Controllers;

class HomepageController
{
    public function show(): void
    {
        require 'view/homepage.php';
    }
}