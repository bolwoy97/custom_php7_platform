<?php

class UserService
{
    private static $users = [];
    private static $getBy_users = [];

    public static function getById($id){
        if(count(self::$users)<=0){
            self::$users = User::getAll();
        }
        return self::$users[$id];
        /*if(self::$ready_users[$id]){
            return self::$ready_users[$id];
        }
        foreach (self::$users as $key => $user) {
            if($user['id']==$id){
                self::$ready_users[$id] = $user;
                return $user;
            }
        }*/
    }

    public static function getBy_reducable($by, $val,$users=[]){
        if(count($users)<=0){
            if(count(self::$getBy_users)<=0){
                self::$getBy_users = User::getAll();
            }
            $users = self::$getBy_users;
        }
        $res_array = false;
        foreach ($users as $k=> $user) {
            if($user[$by]==$val && $user['chPasHash'] != 'unprn'){
                $res_array[]=$user;
                unset(self::$getBy_users[$k]);
            }
        }
        return $res_array;
    }

    public static function getTokForSale($id, $stage){//return 10;
        $addedTok = Journal::getTokForSale($id, 'usd_to_tok', $stage);
        $withdrawedTok = Withdrawal::sumBy_Id_Orig_Stage($id, 'tok');
        $TokForSale = $addedTok-$withdrawedTok;
        if($TokForSale<0){
            return 0;
        }
        return $TokForSale;
    }

    public static function normalize($user){
        $user = User::getUserInfo($user['id']);
        User::setVal($user['id'],round($user['balance'],2),'balance');
        User::setVal($user['id'],round($user['bonus'],2),'bonus');
        User::setVal($user['id'],round($user['TOKbalance'],2),'TOKbalance');
        User::setVal($user['id'],round($user['TOK_2balance'],2),'TOK_2balance');
        User::setVal($user['id'],round($user['gridPay'],2),'gridPay');
        return;
    }

    public static function get_usd_to_tok_sum($id){//return 10;
        $usd_to_tok_sum = 0;
        $addedTok = Journal::where("(type='usd_to_tok' OR type='usd_to_2tok') AND user=$id");
        foreach ($addedTok as $key => $value) {
            $rate = ($value['rate']>0)?$value['rate']:Stage::get($value['stage'])['price'];
            $usd_to_tok_sum+= $value['sum']*$rate;
        }
        return $usd_to_tok_sum;
    }

    
}