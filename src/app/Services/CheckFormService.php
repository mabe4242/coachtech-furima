<?php

namespace App\Services;

class CheckFormService 
{
    public static function formattedPrice(int $data){
        $formattedPrice = number_format($data);

        return $formattedPrice;
    }

    public static function checkCondition(int $data){
        if($data === 1){$itemCondition = '良好';}
        if($data === 2){$itemCondition = '目立った傷や汚れなし';}
        if($data === 3){$itemCondition = 'やや傷や汚れあり';}
        if($data === 4){$itemCondition = '状態が悪い';}

        return $itemCondition;
    }
}