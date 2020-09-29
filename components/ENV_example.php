<?php

$GLOBALS['env'] = array(
    'min_usd_to_tok_sum'=>100, //для проверки при выводе бонусных и продаже токена
    'min_with_sum'=>10,
    'partner_prog_sum'=>100, //для лидерской программы
    
    'adm_pass' => 'adm_pass',
    'fch_merch_name' => 'fch_merch_name',
    'fch_merch_pass' => 'fch_merch_pass',
    'cp_merch_id' => 'cp_merch_id',
    'cp_pass' => 'cp_pass',
    'pm_pass' => 'pm_pass',
    'cp_pub' => 'cp_pub',
    'cp_pri' => 'cp_pri',
    'email' => 'email@gmail.com',
    'email_pass' => 'email_pass',

);

$GLOBALS['env']['api_secure_code'] = 'api_secure_code';

/**LOCAL ENV */

$GLOBALS['env']['local']['yard_site'] = 'http://gridyarnci/';

$GLOBALS['env']['local']['db']['hostname'] = 'localhost';
$GLOBALS['env']['local']['db']['username'] = 'root';
$GLOBALS['env']['local']['db']['password'] = 'root';
$GLOBALS['env']['local']['db']['database'] = 'grid';


/**SERVER ENV */

$GLOBALS['env']['serv']['yard_site'] = 'https://yard_site/';

$GLOBALS['env']['serv']['db']['hostname'] = 'hostname.hostname.hostname.hostname';
$GLOBALS['env']['serv']['db']['username'] = 'username';
$GLOBALS['env']['serv']['db']['password'] = 'password+q';
$GLOBALS['env']['serv']['db']['database'] = 'grid';
  

