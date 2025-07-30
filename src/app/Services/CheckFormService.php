<?php

namespace App\Services;

class CheckFormService 
{
    public static function calcTaxPrice(int $data){
        $tax_price = $data * 1.1;
        $tax_price = number_format($tax_price);

        return $tax_price;
    }

    public static function checkCondition(int $data){
        if($data === 1){$item_condition = '良好';}
        if($data === 2){$item_condition = '目立った傷や汚れなし';}
        if($data === 3){$item_condition = 'やや傷や汚れあり';}
        if($data === 4){$item_condition = '状態が悪い';}

        return $item_condition;
    }
}