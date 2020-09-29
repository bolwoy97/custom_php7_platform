<?php

class TableService
{
    /*public static function render($data, $rows, $search='', $page=''){
        $lng=Language::get();
            //search
            if(isset($search) && count($search)>0 && $search!=''){
                //echo 'search ',$search;exit;
                $result=array();
                foreach ($data as $k1 => $value) {
                    foreach ($rows as $k2=>$row) {
                        //strpos(trim(strtoupper($value[$row])), trim(strtoupper($search))) !== false
                        $pattern =  mb_strtoupper(trim($search), 'UTF-8');
                        $str = mb_strtoupper(trim($value[$row]), 'UTF-8');
                        //echo "$pattern = $str";exit;
                        if(preg_match("~$pattern~", $str)){
                            $result[]=$value;
                            break;
                        }
                    } 
                }
                $data = $result;
            }
            //paginate
            $pages = floor(count($data)/$_POST['perPage']);
            if($_POST['page']>$pages){$_POST['page']=$pages;}
            elseif($_POST['page']<0){$_POST['page']=0;}
            $data = array_slice($data,$_POST['perPage']*$_POST['page'],$_POST['perPage']);
            if($page!=''){
                require_once(ROOT.$page);
                exit;
            }
    }*/

    public static function prepare($data, $rows=[], $search='', $page=0, $perPage=10){
            $lng=Language::get();
            //search
            if(isset($search) && strlen($search)>0 && $search!=''){
                $result=array();
                foreach ($data as $k1 => $value) {
                    foreach ($rows as $k2=>$row) {
                        $pattern =  mb_strtoupper(trim($search), 'UTF-8');
                        $str = mb_strtoupper(trim($value[$row]), 'UTF-8');
                        if(preg_match("~$pattern~", $str)){
                            $result[]=$value;
                            break;
                        }
                    } 
                }
                $data = $result;
            }
            //paginate
            $pages = floor(count($data)/$perPage);
            if($page>$pages){$page=$pages;}
            elseif($page<0){$page=0;}
            $data = ['data'=>array_slice($data,$perPage*$page,$perPage), 'page'=>$page, 'pages'=>$pages, 
            'memory'=>memory_get_usage()/1000000 .' Mb', 'exec_time'=>(microtime(true)-START).' s'];
            return $data;
    }

   

}