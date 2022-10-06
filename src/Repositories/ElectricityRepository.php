<?php
namespace Viktorija\Atsiskaitymas\Repositories;



class ElectricityRepository
{

    public function getAll():array
    {
        $electricities=json_decode(file_get_contents('./data/electricity.json', true), true);
        if($electricities===NULL){
            $electricities=[];
        };
        return $electricities;

    }
    public function create(array $fields) {
        $name=$fields['amount'];
        $price=$fields['price'];
        $tariff=$fields['tariff'];
        $electricities = $this->getAll();
        $electricities[] = [
            'amount' => $name,
            'price'=> $price,
            'tariff'=>$tariff,
        ];
        $this->saveToFile($electricities);
    }
    private function saveToFile(array $electricities){
        $content=json_encode($electricities);
        file_put_contents('data/electricity.json', $content);
    }
    public function sum($electricities){

        $sum=0;
        foreach ($electricities as $electricity){
            $sum+=$electricity['price'];
        }
        return $sum;

    }

//    public function discount($sum){
//        if(isset($_POST['discount'])){
//            $discountedSum=$sum*0.8;
//        }
//        return $discountedSum;
//
//
//
//    }
}
