<?php
class Data

{
    

    public static function short_link($longurl)
    {
        // Bit.ly  
        $url = "http://api.bit.ly/shorten?version=2.0.1&longUrl=$longurl&login=exxolon&apiKey=R_1eeecc6aad394b75aa7d4812e4bf650a&format=json&history=1";  

        $s = curl_init();  
        curl_setopt($s,CURLOPT_URL, $url);  
        curl_setopt($s,CURLOPT_HEADER,false);  
        curl_setopt($s,CURLOPT_RETURNTRANSFER,1);  
        $result = curl_exec($s);  
        curl_close( $s );  

        $obj = json_decode($result, true);  
        return $obj["results"]["$longurl"]["shortUrl"];  
    }

    public static function key($type)
    {
        $key = '';
       if($type=='pub'){
            $key = $GLOBALS['env']['cp_pub'];
       }elseif($type=='pri'){
            $key = $GLOBALS['env']['cp_pri'];
       }

        return $key;
    }

    public static function captcha()
    {
        //session_start();
        $captcha_num = rand(1000, 9999);
        $_SESSION['code'] = $captcha_num;

        $font_size = 30;
        $img_width = 70;
        $img_height = 40;
        header('Content-type: image/jpeg');

        $image = imagecreate($img_width, $img_height); // create background image with dimensions
        imagecolorallocate($image, 255, 255, 255);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        imagettftext($image, $font_size, 0, 15, 30, $text_color, 'font.ttf', $captcha_num);
        imagejpeg($image);
    }

    public static function course($cur= 'btc')
    {
                    if($cur=='usd' || $cur=='usdw'){
                        $course = 1; 
                    }else{
                       
                        $course =  Option::get(''.$cur.'_course');
                    } 
                return $course;
    } 

    public static function courseFromCP()
    {
        require_once(ROOT .'/res/coinpayments/coinpayments.inc.php');
                $cps = new CoinPaymentsAPI();
                $cps->Setup(Data::key('pri'),Data::key('pub') );
            
                $result = $cps->GetRates();

                if ($result['error'] == 'ok') {
                    /*foreach ($result['result'] as $key => $value) {
                        echo "$key =>";
                        var_dump($value);
                        echo '<br>';
                    }*/
                    //var_dump($result['result']);exit;
                    //USDT.ERC20
                        $btcToUsd =  1/$result['result']['USD']['rate_btc'];   
                       // $course[] = $result['result'][strtoupper($cur)]['rate_btc']*  $btcToUsd;
                        $course['btc'] = $result['result']['BTC']['rate_btc']*  $btcToUsd;
                        $course['eth'] = $result['result']['ETH']['rate_btc']*  $btcToUsd;
                        $course['bch'] = $result['result']['BCH']['rate_btc']*  $btcToUsd;
                        $course['usdt_erc20'] = $result['result']['USDT.ERC20']['rate_btc']*  $btcToUsd;
                    
                } else {
                    $course ='Error: '.$result['error']."\n";
                }
              
                return $course;
    } 


    public static function fee($type)
    {//Data::fee()
        $fee = '';
       if($type=='in'){
            $fee = doubleval(Option::get('in_fee'));
       }elseif($type=='out'){
            $fee = doubleval(Option::get('out_fee'));
       }

        return $fee;
    } 

   

    
    public static function check($var)
    {
        if(isset($var)&&$var!=null&&$var!=''){
            return true;
        }
        return false;
    }

    public static function checkUserEnter()
    {
        if(!isset($_SESSION['userId'])){
            return false;
        }
        $user = User::getUserInfo($_SESSION['userId']);
        $str = md5('u'.$user['id'].''.$user['login']);
        if($user ['ban_enter']==1 ||  $str!=$_SESSION['check'] ){
            return false;
        }
        return true;
    }
    


    public static function getBankCourse($val)
    {
        $data = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
       $courses= json_decode($data);
      $array = json_decode(json_encode($courses), true);
      foreach($array as $ar){
          if($ar['ccy'] == strtoupper($val)){
           return $ar['buy'];
          }
      }
      return FALSE;
    }
 
   
   /* public static function stages()
    {
       return [ 
           ['price'=>0.1, 'goal'=> 2500000], 
           ['price'=>0.2, 'goal'=> 2500000], 
           ['price'=>0.3, 'goal'=> 2500000], 
           ['price'=>0.4, 'goal'=> 2500000]
       ];
    }*/

    public static function refAccrs()
    {
       return [10,3,2,1,1,1,1 ];
    }
    
    public static function tokPrice()
    {
       return Stage::get(Option::get('stage'))['price'];
    }

    public static function curStage()
    {
       return Stage::get(Option::get('stage'));
    }


    /////////////////////
    ///TOOLS
    /////////////////////

    
    public static function getLast($tab, $last, $type=''){
        $db = Db::getConnection();

        $sql = "SELECT * FROM $tab ORDER BY id $type LIMIT $last ";

        $result = $db->prepare($sql);
        //$result->bindParam(':last', $last, PDO::PARAM_STR);
        $result->execute();
        $res = false;
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
         return $res;
    }

    public static function showData($data){
        foreach($data as $log ){
            foreach($log as $k => $val ){
                echo $k.' => '.$val.' | ';
            }
            echo '<br>//===============>><br>';
        }
    }

    public static function cLog($data){
        try{
        $log  = "--log_ ".date("Y-m-d H:i:s")." => ".$data." ".PHP_EOL;
        file_put_contents(CLOG, $log, FILE_APPEND);
       // echo 'success'.CLOG;
        } catch (Exception $e) {
        echo 'error: '.$e->getMessage(); 
     }
    }
    
    public static function clearLog(){
        try{
        $log  = "";
        file_put_contents(ERLOG, $log);
        echo 'success '.ERLOG;
        } catch (Exception $e) {
        echo 'error: '.$e->getMessage(); 
     }
    }

    public static function getCustom(){
        $db = Db::getConnection();

        $sql = "SELECT *  FROM users WHERE id > 948 AND chPasHash = 'unprn' ";

        $result = $db->prepare($sql);
       // $result->bindParam(':data', 'unprn', PDO::PARAM_STR);
        $result->execute();
        //$row = $result->fetch();
        while ($row = $result->fetch()) {
            $res[] = $row;
         }
         return $res;
    }

    public static function CustomMessagePage($text='',$header='',$link='/'){
        require_once(ROOT.'/views/tools/custom_message.php');
        return true;
    }

  
    public static function checkRemoteFile($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    curl_close($ch);
    if($result !== FALSE)
    {
        return true;
    }
    else
    {
        return false;
    }
}
 

public static function imageUrl()
{
    return (file_exists(IMG_ROOT.$_SESSION['user']['img'])&& IMG_ROOT.$_SESSION['user']['img']!='upload/')?IMG_ROOT.$_SESSION['user']['img']:'res/photo-default.png';
}


}
