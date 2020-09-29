<?php

class StageService
{
    public static function get_sum_usd(){
        //$additions = Journal::where("(type='usd_to_tok' OR type='usd_to_2tok') AND stage =".Option::get('stage'));
        $Stage = Stage::get(Option::get('stage'));
        $additions = Journal::where("(type='usd_to_tok' OR type='usd_to_2tok') AND date >='{$Stage['start']}'");
        //echo "(type='usd_to_tok' OR type='usd_to_2tok') AND date >='{$Stage['start']}'";exit;
        $usd_sum = 0.0;
        foreach ($additions as $key => $value) {
            $usd_sum += $value['sum']*$value['rate'];
        }
        return $usd_sum;
    }

}