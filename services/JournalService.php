<?php

function date_compare($element1, $element2) { 
    $datetime1 = strtotime($element1['date']); 
    $datetime2 = strtotime($element2['date']); 
    return $datetime2 - $datetime1; 
}

class JournalService
{

   /* private static $allRecords = [];

    public static function getByUserAndType($id, $types, $allRecords=[]){
        if(count($allRecords)<=0){
            if(count(self::$allRecords)<=0){
                self::$allRecords = Journal::all();
            }
            $allRecords = self::$allRecords;
        }
        $records = array();
        foreach ($allRecords as  $rec) {
            if($rec['user']==$id && in_array($rec['user'],$types)){
                $records[] = $rec;
            }
        }
        return $records;
    }*/

    public static function getLastUsersDesk($id, $lim='all')
    {
        $levels = User::getLvl($id, 1000);
        $lUsers = array();
        $UserService = new UserService();
        foreach($levels as $key=>$lvl){
            foreach($lvl as $k=>$lUsr){
                $lUsr['lvl'] = $key+1;
                $lUsr['sponsorLogin'] = $UserService::getById( $lUsr['sponsor'])['login'];
                $lUsers [] = $lUsr;
            }
        }
        //usort($lUsers, 'date_compare');
        $lUsers= array_reverse($lUsers);
        if($lim!='all'){
            return array_slice($lUsers, 0, $lim, true);
        }
        return $lUsers;
    }

    public static function combineWithsAndJournal($withs, $journal)
    {
        $lng=Language::get();
        
        $result = array();
        //format journal
        foreach ($journal as $k=>$jor) {
            $jor['status'] = 'confirmed';
            $result[] = $jor;
        }
        //format withs
        foreach ($withs as $k=>$with) {
            $with['name'] = 'Withdrawal';
            $with['type'] = 'with';
            $result[] = $with;
        }

        
        $icins = ['confirmed'=>'complete.svg','canceled'=>'cancel.png','pending'=>'pending.png','unactive'=>''];
        $jour_lang = self::jour_lang();
        $status_lang = self::status_lang();
        $UserService = new UserService();
        foreach ($result as $k=>$jor) {
            $jor['comp_time'] = strtotime($jor['date']);

            $usr = $UserService::getById($jor['user']);
            $jor['user_show_hid']=substr($usr['login'],0,2).'***'.substr($usr['login'],-2);
            $jor['stage_show'] = ($jor['stage']+1).' '.$lng['txt84'];
            $jor['status_show'] = $status_lang[$jor['status']];
            $jor['status_img'] = $icins[$jor['status']];
            if($jor['cur']=='usdt_erc20'){
                $jor['cur_show']='USDT';
            }else{
                $jor['cur_show']=strtoupper($jor['cur']);
            }
            
            if($jor['type']=='bon' && $jor['adr']!=''){
                $jor['operation'] = 'Реферальные от '.$UserService::getById($jor['adr'])['login'];
            }elseif($jor['orig']=='tok'){
                $jor['operation'] = $lng['txt247'];
            }elseif($jor['cur']=='balance'){
                $jor['operation'] = $lng['txt130'];
            }elseif($jour_lang[$jor['type']]){
                $jor['operation'] = $jour_lang[$jor['type']];
            }else{
                $jor['operation'] = $jor['name'];
            }
            
            if($jor['type']=='with'){
                if($jor['orig']=='tok'){
                    if(strtoupper($jor['cur'])==strtoupper('gridPay')){
                        $jor['amount']= round($jor['sum'],2).'GRD > '.
                        ($jor['sum']*$jor['rate']).' '.$jor['cur_show'];
                    }else{
                        $jor['amount']= round($jor['sum'],2).'GRD > '.$jor['cur_show'];
                    }
                }else{
                    $jor['amount']= round($jor['sum'],2).'USD > '.$jor['cur_show'];
                }
            }elseif($jor['type']=='gridpay_add'){
                if($jor['cur']=='tok'){
                    $jor['amount']= round($jor['sum'],2).'GRD > '.
                        ($jor['sum']*$jor['rate']).' USD';
                }else{
                    $jor['amount']= round($jor['sum'],2).'USD > GRIDPAY';
                }
            }elseif($jor['type']=='gridpay_send' ){
                    $jor['amount']= round($jor['sum'],2).'USD > '.$jor['detail'];
            }elseif( $jor['type']=='gridpay_rec'){
                $jor['amount']= round($jor['sum'],2).'USD < '.$jor['detail'];
            }else{
                if($jor['cur']=='tok'){
                    $jor['amount']= round($jor['sum'],4).' GRD';
                }else{
                    $jor['amount']= round($jor['sum'],2).' '.$jor['cur_show'];
                }
            }
            
            $result[$k]=$jor;
        }

        //usort($result, 'date_compare');
        usort($result, function ($item1, $item2) {
            return $item2['comp_time']>$item1['comp_time'];
         });
        return $result;
    }

    public static function jour_lang()
    {
        $lng=Language::get();
        $jour_lang = ['usd_to_tok'=>$lng['txt203'],'usd_to_2tok'=>$lng['txt203'],
        'add'=>$lng['txt204'],'adm_add'=>$lng['txt204'],
        'bon'=>$lng['txt205'],'with'=>$lng['txt206'],
        'gridpay_add'=>$lng['txt204'],'gridpay_add_fchange'=>$lng['txt204'],
        'gridpay_send'=>$lng['txt248'],'gridpay_rec'=>$lng['txt249']
        ,'ref_prog_bon'=>'Начисление бонусной программы'
    ];
        
        return $jour_lang;
    }

    public static function status_lang()
    {
        $lng=Language::get();
        $status_lang = ['confirmed'=>$lng['txt207'],'canceled'=>$lng['txt208'],
                    'pending'=>$lng['txt209'],'unactive'=>$lng['txt210']];
        
        return $status_lang;
    }


}
