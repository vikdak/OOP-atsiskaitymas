<?php
namespace Viktorija\Atsiskaitymas\Interfaces;

interface RouterInterface
{
    public function process(string $url, string $method);
}