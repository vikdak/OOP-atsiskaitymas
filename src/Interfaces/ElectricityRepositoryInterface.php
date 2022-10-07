<?php
namespace Viktorija\Atsiskaitymas\Interfaces;

interface ElectricityRepositoryInterface
{
    public function getAll(): array;

    public function create(array $fields):void;

    public function sum(array $electricities);

    public function delete(array $fields): void;

}