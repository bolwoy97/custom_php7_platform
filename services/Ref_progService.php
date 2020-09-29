<?php

class Ref_progService
{
    public static function getCurrent()
    {
        $dtime = date("Y-m-d H:i:s");
        $cur_prog = Ref_prog::where("real_end<='0000-00-00' AND start <='{$dtime}' AND end >='{$dtime}'")[0];
        if(count($cur_prog)>0){
            if(strtotime($cur_prog['end'])<=time()){
                Ref_prog::setVal($cur_prog['id'], $dtime, 'real_end');
                return false;
            }
            $cur_prog['rates'] = unserialize($cur_prog['rates']);
            $cur_prog['rewards'] = unserialize($cur_prog['rewards']);
            return $cur_prog;
        }else{
            return false;
        }
    }

    public static function getCurrent_adm()
    {
        $dtime = date("Y-m-d H:i:s");
        $cur_prog = Ref_prog::where("real_end<='0000-00-00'")[0];
        if(count($cur_prog)>0){
            if(strtotime($cur_prog['end'])<=time()){
                Ref_prog::setVal($cur_prog['id'], $dtime, 'real_end');
                return false;
            }
            $cur_prog['rates'] = unserialize($cur_prog['rates']);
            $cur_prog['rewards'] = unserialize($cur_prog['rewards']);
            return $cur_prog;
        }else{
            return false;
        }
    }

    public static function CheckReward($user, $cur_ref_prog)
    {
        $user = User::getUserInfo($user['id']);
        $sum = round($user['ref_prog_sum'],2);
        //echo $sum,'-<br>';
        foreach ($cur_ref_prog['rewards'] as $reward) {
            //echo $reward['amount'],'<br>';
            if($sum>=$reward['amount'] && $user['ref_prog_max']<$reward['amount']){
                //echo $sum,'+<br>';
                User::addVal($user['id'],$reward['reward'],'bonus');
                User::setVal($user['id'],$reward['amount'],'ref_prog_max');
                $dtime = date("Y-m-d H:i:s");
                Journal::add('ref_prog_bon',$user['id'],$reward['reward'],$dtime,"",$sum,
                "complete",$reward['amount'], 'bon','', $cur_ref_prog['id']);   
            }
        }
    }

  

}
