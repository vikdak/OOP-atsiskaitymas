<?php
declare(strict_types=1);

namespace Viktorija\Atsiskaitymas\Controllers;

use Viktorija\Atsiskaitymas\Interfaces\ValidationInterface;

class Validation implements ValidationInterface
{
    public static function isValid(string $month)
    {
        $lastMonth = date('Y-m', strtotime("-1 month"));
        $dateNowObject = new \DateTime('now');
        $lastDay = date('Y-m-t', strtotime($month));
        if (preg_match('/^(19[0-9]{2}|2[0-9]{3})\-(0[1-9]|1[0-2])/', $month)) {
            if ($month < $lastMonth) {
                $day_diff = $dateNowObject->diff(new \DateTime($lastDay))->format("%a");
                throw new \Exception("Vėluoji mokėti mokesčius $day_diff dienas");
            } elseif ((date('Y-m-d')) < (date('Y-m-t', strtotime($month)))) {
                throw new \Exception("Mokesčius moki per anksti");
                die();
            } else {
                echo 'Duomenys suvesti';
                return $month;
            }
        } else {
            throw new \Exception("Patikrinkite suvestą datą");
        }
    }
}