<?php

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../header.php');
include_once(dirname(__FILE__).'/zarinpalzaringatepayment.php');

	if (!$cookie->isLogged())
		Tools::redirect('authentication.php?back=order.php');
                
        $currency_default = Currency::getCurrency(intval(Configuration::get('PS_CURRENCY_DEFAULT')));        
        $zarinpalzaringatepayment= new zarinpalzaringatepayment(); // Create an object for order validation and language translations
		
		$order_cart = new Cart(intval($_COOKIE["OrderId"]));
		
		$PurchaseAmount=number_format(Tools::convertPrice(intval($_COOKIE["PurchaseAmount"]), $currency_default), 0, '', '');
		$OrderAmount=number_format(Tools::convertPrice($order_cart->getOrderTotal(true, 3), $currency_default), 0, '', '');
	
        $result = $zarinpalzaringatepayment->confirmPayment($PurchaseAmount);
	
	// We now think that the response is valid, so we can look at the result      
	$result = $zarinpalzaringatepayment->showMessages($result);

	// if we have a valid completed order, validate it

	$hash_data = 'o='.$_COOKIE["OrderId"].$_COOKIE["PurchaseAmount"];
	$hash = crypt($hash_data, Configuration::get('ZARINPAL_HASHKEY'));
	
	if (($result==1) and ($hash==$_COOKIE["ZARINPAL_HASH"]))
	{
		if($PurchaseAmount==$OrderAmount)
			 $zarinpalzaringatepayment->validateOrder(intval($_COOKIE["OrderId"]), _PS_OS_PAYMENT_,$order_cart->getOrderTotal(true, 3), $zarinpalzaringatepayment->displayName, $zarinpalzaringatepayment->l('Payment Accepted'), array(), $cookie->id_currency);
		else
			 $zarinpalzaringatepayment->validateOrder(intval($_COOKIE["OrderId"]), _PS_OS_PAYMENT_,$PurchaseAmount, $zarinpalzaringatepayment->displayName, $zarinpalzaringatepayment->l('Payment Accepted'), array(), $cookie->id_currency);


        setcookie("ZARINPAL_HASH", "", -1);
        setcookie("OrderId", "", -1);
        setcookie("PurchaseAmount","", -1);
 		
        Tools::redirect('history.php');
	}

include_once(dirname(__FILE__).'/../../footer.php');		

?>
