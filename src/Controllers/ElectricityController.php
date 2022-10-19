<?php
declare(strict_types=1);

namespace Viktorija\Atsiskaitymas\Controllers;

use Viktorija\Atsiskaitymas\Interfaces\ElectricityControllerInterface;
use Viktorija\Atsiskaitymas\Repositories\ElectricityRepository;

class ElectricityController implements ElectricityControllerInterface
{
    public function __construct(private ElectricityRepository $repository)
    {
    }

    public function list()
    {
        $sum = 0;
        $electricities = $this->repository->getAll();
        $sum = $this->repository->sum($electricities);
        $sumDay = $this->repository->sumDay($electricities);
        $sumNight = $this->repository->sumNight($electricities);
        require 'view/sum.php';
    }

    public function create()
    {
        $this->repository->create($_POST);
    }

    public function delete()
    {
        $this->repository->delete($_POST);
        require 'view/homepage.php';
    }

}