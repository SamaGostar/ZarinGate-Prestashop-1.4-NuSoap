<!-- Zarinpal Payment Module -->
<p class="payment_module">
    <a href="javascript:$('#zarinpalzaringatepayment_form').submit();" title="{l s='Pay by Zarinpal' mod='zarinpalzaringatepayment'}">
        <img src="modules/zarinpalzaringatepayment/zarinpal.png" alt="{l s='Pay by Zarinpal' mod='zarinpalzaringatepayment'}" />
		{l s='Pay by Debit/Credit card through Zarinpal Online Merchent.' mod='zarinpalzaringatepayment'}
<br>
</a></p>
<a class="exclusive_large" href="javascript:$('#zarinpalzaringatepayment_form').submit();" title="{l s='Pay by Zarinpal' mod='zarinpalzaringatepayment'}">{l s='Pay by Zarinpal' mod='zarinpalzaringatepayment'}</a>
<form action="modules/zarinpalzaringatepayment/payment.php" method="post" id="zarinpalzaringatepayment_form" class="hidden">
    <input type="hidden" name="orderId" value="{$orderId}" />
</form>
<br><br>
<!-- End of Zarinpal Payment Module-->
