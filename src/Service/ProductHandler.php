<?php

namespace App\Service;

class ProductHandler
{
    public function totalPrice(array $products) :int
    {
        return array_sum(array_column($products, 'price'));
    }

    public function sortPrice(array $products, $type = 'Dessert') :array
    {
        $wait = [];

        foreach ($products as $key => $value){
            if($value['type']==$type) $wait[] = $value;
        }

        $sort = array_column($wait, 'price');

        array_multisort($sort, SORT_DESC, $wait);

        return $wait;
    }

    public function formatTime(array $products) :array
    {
        foreach ($products as $key=>$value){
            $products[$key]['create_at'] = strtotime($value['create_at']);
        }
        return $products;
    }
}