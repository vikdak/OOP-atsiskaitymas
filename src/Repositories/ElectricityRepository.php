<?php
declare(strict_types=1);

namespace Viktorija\Atsiskaitymas\Repositories;

use Viktorija\Atsiskaitymas\Controllers\Validation;

class ElectricityRepository
{

    public function getAll(): array
    {
        $electricities = json_decode(file_get_contents('./data/electricity.json', true), true);
        if ($electricities === NULL) {
            $electricities = [];
        };
        return $electricities;
    }

    public function create(array $fields):void
    {
        $name = $fields['amount'];
        $price = $fields['price'];
        $tariff = $fields['tariff'];
        $month = Validation::isValid($fields['month']);
        $electricities = $this->getAll();
        $electricities[] = [
            'amount' => $name,
            'price' => $price,
            'tariff' => $tariff,
            'month' => $month,
        ];

        $this->saveToFile($electricities);
    }

    public function sum($electricities)
    {
        $sumDay = $this->sumDay($electricities);
        $sumNight = $this->sumNight($electricities);
        $sum = $sumDay + $sumNight;
        return $sum;
    }

    private function saveToFile(array $electricities):void
    {
        $content = json_encode($electricities);
        file_put_contents('data/electricity.json', $content);
    }

    public function sumNight(array $electricities)
    {
        $sumNight = 0;
        foreach ($electricities as $key => $electricity) {
            if (array_key_exists('tariff', $electricity)) {
                if (in_array('Naktinis', $electricity)) {
                    $sumNight = (float)$electricity['price'] * (float)$electricity['amount'];
                }
            }
        }
        return $sumNight;
    }

    public function sumDay($electricities)
    {
        $sumDay = 0;
        foreach ($electricities as $key => $electricity) {
            if (array_key_exists('tariff', $electricity)) {
                if (in_array('Dieninis', $electricity)) {
                    $sumDay = (float)$electricity['price'] * (float)$electricity['amount'];
                }
            }
        }
        return $sumDay;
    }

    public function delete(array $fields)
    {
        $electricities = $this->getAll();
        foreach ($electricities as $key=>$electricity){
            if (isset($electricities[$key]) ){
                unset($electricities[$key]);
            };
        }
        $this->saveToFile($electricities);
    }
}
