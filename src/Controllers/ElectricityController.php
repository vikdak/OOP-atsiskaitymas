<?php

namespace Viktorija\Atsiskaitymas\Controllers;

use Viktorija\Atsiskaitymas\Repositories\ElectricityRepository;

class ElectricityController
{
    public function __construct(private ElectricityRepository $repository)
    {
    }

    public function list()
    {
        $sum=0;
        $electricities = $this->repository->getAll();
        require 'view/list.php';

    }

    public function create()
    {
        $this->repository->create($_POST);
    }

    public function sum()
    {
        $electricities = $this->repository->getAll();
        $sum = $this->repository->sum();
        $sumDay=$this->repository->sumDay();
        $sumNight=$this->repository->sumNight();
        require 'view/sum.php';

    }

//    public function discount($sum)
//    {
//        $inventories = $this->repository->getAll();
//        $sum = $this->repository->sum($inventories);
//        $discountedSum = $this->repository->discount($sum);
//        require 'view/discount.php';
//
//    }

}