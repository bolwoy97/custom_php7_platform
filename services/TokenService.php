<?php

class TokenService
{
    public static function get_tok2_price(){
        return Data::tokPrice();
        /*$Stage = Stage::get(Option::get('stage'));
        $part_of_goal = floor($Stage['sum']/100000);
        $tokPrice = $Stage['price']-(0.1-0.02*$part_of_goal);
        return $tokPrice;*/
        
    }

}