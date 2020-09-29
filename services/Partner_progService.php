<?php

class Partner_progService
{
    public static function getCurrent()
    {
        $dtime = date("Y-m-d H:i:s");
        $cur_prog = Partner_prog::where("real_end<='0000-00-00' AND start <='{$dtime}' AND end >='{$dtime}'")[0];
        if(count($cur_prog)>0){
            if(strtotime($cur_prog['end'])<=time()){
                Partner_prog::setVal($cur_prog['id'], $dtime, 'real_end');
                return false;
            }
            return $cur_prog;
        }else{
            return false;
        }
    }

    public static function getCurrent_adm()
    {
        $dtime = date("Y-m-d H:i:s");
        $cur_prog = Partner_prog::where("real_end<='0000-00-00'")[0];
        if(count($cur_prog)>0){
            if(strtotime($cur_prog['end'])<=time()){
                Partner_prog::setVal($cur_prog['id'], $dtime, 'real_end');
                return false;
            }
            return $cur_prog;
        }else{
            return false;
        }
    }

    public static function top_users($cur_partner_prog)
    {
        $users= User::where("usd_to_tok_sum>=".$GLOBALS['env']['partner_prog_sum']);
        foreach ($users as $k => $user) {
            $users[$k]['partners_prog_count']=0;
            /*$partners = User::where("sponsor={$user['id']} AND date>='{$cur_partner_prog['start']}'
            AND date<='{$cur_partner_prog['end']}' AND usd_to_tok_sum>=".$GLOBALS['env']['partner_prog_sum']);
            $users[$k]['partners_prog_count'] = count($partners);*/
            foreach ($users as $k1 => $user1) {
                if($user1['sponsor']==$user['id'] &&
                 strtotime($user1['date'])>= strtotime($cur_partner_prog['start']) && 
                 strtotime($user1['date'])<= strtotime($cur_partner_prog['end']) &&
                 $user1['usd_to_tok_sum']>= $GLOBALS['env']['partner_prog_sum']){
                    $users[$k]['partners_prog_count'] ++;
                    $users[$k]['partners_prog_sum'] +=$user1['usd_to_tok_sum'];
                }
            }
        }
        usort($users, function ($item1, $item2) {
           return $item2['partners_prog_sum']>$item1['partners_prog_sum'];
        });
        usort($users, function ($item1, $item2) {
           return $item2['partners_prog_count']>$item1['partners_prog_count'];
        });
       
        return array_chunk($users,10)[0];
    }

}
