<?php

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../header.php');
include_once(dirname(__FILE__).'/zarinpalzaringatepayment.php');

if (!$cookie->isLogged())
    Tools::redirect('authentication.php?back=order.php');
	
$zarinpalzaringatepayment= new zarinpalzaringatepayment();
echo $zarinpalzaringatepayment->execPayment($cart);

include_once(dirname(__FILE__).'/../../footer.php');

?>
