<?php

return array(
	
	'gr_bon_with' => 'gr_pay/bon_with/',
	'gr_buy_tok' => 'gr_pay/buy_tok/',
	'gr_dashboard' => 'gr_site/dashboard/',
	'gr_complex' => 'gr_site/complex/',
	'gr_events' => 'gr_site/events/',

	'adm_gr_orders' => 'admin/gr_orders/',
	
	
	'grid_pay_send' => 'gridpay/send/',
	'grid_pay_with' => 'gridpay/with/',

	'fchange/form' => 'fchange/form/',
	'fchange/status' => 'fchange/status/',
	'fchange/sucess' => 'fchange/sucess/',
	'fchange/error' => 'fchange/error/',

	'tw_admin' => 'admin/admin/',
	'adm_tg_purchases' => 'admin/tg_purchases/',
	'adm_unact_users' => 'admin/unact_users/',
	'adm_all_users' => 'admin/all_users/',
	'adm_set_opt' => 'adminActions/set_opt/',
	'adm_additions' => 'admin/additions/',
	'adm_finance' => 'admin/finance/',
	'adm_orders' => 'admin/orders/',
	'adm_sales' => 'admin/sales/',
	'adm_bonus' => 'admin/bonus/',
	'admin/setbonus' => 'adminActions/setbonus/',
	'adm_tok2' => 'admin/tok2/',
	'adm_gridpay_transfers' => 'admin/gridpay_transfers/',
	'adm_gridpay' => 'admin/gridpay/',
	'admin/set_tok2' => 'adminActions/set_tok2/',
	'adm_verifications' => 'admin/verifications/',
	'adm_user_verif-([0-9]+)' => 'admin/user_verif/$1',

	'adm_partner_prog' => 'admin/partner_prog/',
	'adm_set_partner_prog' => 'adminActions/partner_prog_set/',
	'adm_flags_partner_prog' => 'admin/partner_prog_flags/',
	'adm_script_partner_prog' => 'admin/script_partner_prog/',

	'adm_ref_prog' => 'admin/ref_prog/',
	'adm_set_ref_prog' => 'adminActions/ref_prog_set/',

	'adm_p_2_p' => 'admin/p_2_p/',

	'adm_news' => 'admin/news/',
	'upd_news' => 'adminActions/updNews/',
	'confirmWith' => 'adminActions/confirmWith/',
	'cancelWith' => 'adminActions/cancelWith/',

	'adm_logs' => 'admin/logs/',
	'adm_closedep' => 'admin/closedep/',

	'adm_user-([0-9]+)' => 'admin/user/$1',
	'admprs-([0-9]+)' => 'adminActions/updprs/$1',

	'prov(\S*)' => 'user/aprove/',
	'linkProv' => 'user/aprLink/',

	'addwalets' => 'preview/addwalets/',
	'apprpin' => 'preview/apprpin/',
	'courses' => 'preview/courses/',
	'TOKprice' => 'preview/TOKprice/',


	'pay/uid=([0-9]+)/cur=(\w+)' => 'pay/callback/$1/$2/',
	'prev/paywal' => 'pay/paywal/',
	
	'clbk/wid=([0-9]+)' => 'pay/caltrans/$1/',

	//test-ef4055d2983c82d08923eb9
	//seed-ef4055d2983c82d08923eb9
	//dayaccr-ef4055d2983c82d08923eb9
	//deposits-ef4055d2983c82d08923eb9
	//gtcurses-ef4055d2983c82d08923eb9
	'getimg' => 'tools/getImg/',
	'test-' => 'tools/test/',
	'seed-(\w*)' => 'tools/seed/$1/',
	'set_usd_to_tok_sum_for_all' => 'tools/set_usd_to_tok_sum_for_all/',
	//'dayaccr-(\w*)' => 'pay/dayaccr/$1/',
	//'deposits-(\w*)' => 'pay/deposits/$1/',
	'gtcurses' => 'tools/getcourses/',


	'usdpayment' => 'pay/usdCallback/', 
	'fchangepayment' => 'pay/FchangeCallback/',

	//'secaccr' => 'pay/secaccr/',
	
	'language-(\w+)' => 'language/set/$1/',

/*	'closeDep' => 'pay/closeDep/',
	'newdep' => 'pay/newdep/',*/
	'newwith' => 'pay/newwith/',
	'tok_with' => 'token/withdraw/',
	'bal_to_gp' => 'gridpay/bal_to_gp/',
	
	'wconf=(\w*)' => 'pay/withConfirm/$1/',
	//'usd_to_tok' => 'token/usd_to_tok/',
	'usd_to_tok' => 'token/usd_to_tok_and_tok2/',
	'usd_to_2tok' => 'token/usd_to_tok2_only/',
	'usd_to_tg_tok' => 'token/usd_to_tg_tok/',
	
	'newadd' => 'pay/newadd/',
	//'updprs' => 'user/updprs/',

	'dashboard' => 'site/index/',
	'operations' => 'site/operations/',
	'partners' => 'site/partners/',
	'buy/tok2' => 'site/buy_tok2/',
	'all-opers' => 'site/all_operations/',
	'p_2_p' => 'site/p_2_p/',
	'gridpay' => 'site/gridpay/',
	'ref_prog' => 'site/ref_prog/',
	'partner_prog' => 'site/partner_prog/',
	'tools' => 'site/tools/',

	'user_mark_partner' => 'partners/mark_partner/',
	'unactive_partner' => 'partners/unactive_partners/',
	
	
	'verification/submit' => 'verification/submit/',
	'verification' => 'verification/page/',

	'withdraw_adr' => 'user/withdraw_adr/',
	'set_contact' => 'user/set_contact/',
	'login' => 'user/login/',
	'register' => 'user/register/',
	'r-(\S*)(\?)(\S*)' => 'user/register/$1/',
	'r-(\S*)' => 'user/register/$1/',
	'disclaimer' => 'land/disclaimer/',
	//'r(\d+)-2r(\S*)' => 'user/register/$1/ok/',
	'logout' => 'user/logout/',
	'recover' => 'user/recover/',
	'chpas=(\w*)' => 'user/chpas/$1/',

	//http://exxolondev/captcha
	'dev-([0-9]+)' => 'tools/dev/$1/',
	//'captcha' => 'tools/captcha/',
	'captcha1' => 'tools/captcha1/',
	//'captcha2' => 'tools/captcha2/',
	
	//'red' => 'tools/red/',

	

	'about' => 'land/about/',
	'marketing' => 'land/marketing/',
	'trading' => 'land/trading/',
	'technology' => 'land/technology/',
	'news' => 'site/news/',
	'nwsv-([0-9]+)' => 'site/newsView/$1/',
	'faq' => 'land/faq/',

	/*'land' => 'land/index/',
	'landing' => 'land/index/',*/

	'(\S+)' => 'land/index/',
	'' => 'land/index/' 
);