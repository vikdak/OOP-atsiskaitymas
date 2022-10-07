<?php
declare(strict_types=1);
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


        $month=$fields['month'];


        $lastMonth= date('Y-m', strtotime("-1 month"));
        $dateNowObject=New \DateTime('now');
        $lastDay=date('Y-m-t',strtotime($month));
        if($month<$lastMonth){
        $day_diff = $dateNowObject->diff(New \DateTime($lastDay))->format("%a");
            throw new \Exception("Vėluoji mokėti mokesčius $day_diff dienas");
        }elseif ((date('Y-m-d')) < (date('Y-m-t',strtotime($month)))){
            throw new \Exception("Mokesčius moki per anksti");
            die();
        }else{
            echo 'Duomenys suvesti';
        }

//        if (!($month===$lastMonth)){
//            if($month===$thisMonth){
//                if(!($dateNow===$lastDayOfThisMonth)||($month))
//                {
//                    echo"moki per anksti";
////                    throw new \Exception("moki per anksti");


        $electricities = $this->getAll();
        $electricities[] = [
            'amount' => $name,
            'price'=> $price,
            'tariff'=>$tariff,
            'month' =>$month,
        ];
        $this->saveToFile($electricities);
    }



    public function sum(){
        $sumDay=$this->sumDay();
        $sumNight=$this->sumNight();
        $sum=$sumDay+$sumNight;
        return $sum;
    }

    private function saveToFile(array $electricities){
        $content=json_encode($electricities);
        file_put_contents('data/electricity.json', $content);
    }
    public function sumNight(){
        $previousMonthElectricities=$this->priviousMonthElectricities();
        foreach ($previousMonthElectricities as $key=>$priviousMonthElectricity){
            if(array_key_exists('tariff', $priviousMonthElectricity)){
                if(in_array('Naktinis', $priviousMonthElectricity)) {
                    $sumNight = (float)$priviousMonthElectricity['price'] * (float)$priviousMonthElectricity['amount'];
                }
            }
        }
        return $sumNight;
    }

    public function sumDay(){
        $previousMonthElectricities=$this->priviousMonthElectricities();
        foreach ($previousMonthElectricities as $key=>$priviousMonthElectricity){
            if(array_key_exists('tariff', $priviousMonthElectricity)){
                if(in_array('Dieninis', $priviousMonthElectricity)) {
                    $sumDay = (float)$priviousMonthElectricity['price'] * (float)$priviousMonthElectricity['amount'];
                }
            }
        }
        return $sumDay;
    }

    private function recreate(){
        $electricities = $this->getAll();
        $groupedElectricities = [];
        foreach ($electricities as $key => $value) {
            $month = $value['month'];
            if (!isset($groupedElectricities[$month])) {
                $groupedElectricities[$month] = [];
            }
            $groupedElectricities[$month][] = $value;
        }
        return $groupedElectricities;
    }

   private function priviousMonthElectricities(){
        $electricities = $this->recreate();
        foreach ($electricities as $key=>$electricity){
            $previousMonthDate=date('Y-m-d', strtotime("last day of -1 month"));
                if(array_key_exists($previousMonthDate, $electricities)){
                    return $electricities[$previousMonthDate];
            }
        }
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

//<form method="POST" action="./delete.php">
//
/*<input type="hidden" name="id" value="<?php echo $key; ?>">*/
//<input type="submit"  value="DELETE">
//</form>

}
