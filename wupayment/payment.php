<?php

/* SSL Management */
require('../../config/config.inc.php');


if(_PS_VERSION_ > "1.1.0.0" && _PS_VERSION_ < "1.5.0.0"){

	$useSSL = true;
@include(dirname(__FILE__).'/../../header.php');
include(dirname(__FILE__).'/wupayment.php');

	if(_PS_VERSION_ < "1.5.0.0"){
			if (!$cookie->isLogged())
			Tools::redirect('authentication.php?back=order.php');
			$wupayment = new WUPayment();
			echo $wupayment->execPayment($cart);
			
			@include_once(dirname(__FILE__).'/../../footer.php');
	}
	else
	{
		$context = Context::getContext();
		if (!$context->customer->isLogged())
		Tools::redirect('authentication.php?back=order.php');
		$wupayment = new WUPayment();
		echo $wupayment->execPayment($cart);
		
		@include_once(dirname(__FILE__).'/../../footer.php');
	}
}
if(_PS_VERSION_ > "1.5.0.0")
{
	if(_PS_VERSION_ > "1.5.0.0" && _PS_VERSION_ < "1.5.4.0"){@include_once(dirname(__FILE__).'/../../header.php');}

include(dirname(__FILE__).'/wupayment.php');






$errors = array();

	global $params;

// init front controller in order to use Tools::redirect
$controller=new FrontController();
$wupayment = new WUPayment();
Tools::redirect(Context::getContext()->link->getModuleLink('wupayment', 'payment'));
	
	}

?>