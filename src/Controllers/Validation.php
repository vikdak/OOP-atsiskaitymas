<?php
namespace Viktorija\Atsiskaitymas\Controllers;

class Validation{
    public static function isValid($month){
        $lastMonth= date('Y-m', strtotime("-1 month"));
        $dateNowObject=New \DateTime('now');
        $lastDay=date('Y-m-t',strtotime($month));
        if(preg_match('/^(19[0-9]{2}|2[0-9]{3})\-(0[1-9]|1[0-2])/', $month)){
            if($month<$lastMonth){
                $day_diff = $dateNowObject->diff(New \DateTime($lastDay))->format("%a");
                throw new \Exception("Vėluoji mokėti mokesčius $day_diff dienas");
            }elseif ((date('Y-m-d')) < (date('Y-m-t',strtotime($month)))){
                throw new \Exception("Mokesčius moki per anksti");
                die();
            }else{
                echo 'Duomenys suvesti';
                return $month;
            }

        }else{
            throw new \Exception("Patikrinkite suvestą datą");
        }
    }
}