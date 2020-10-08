<?php
include(dirname(__FILE__) . '/../../config/config.inc.php');
include(dirname(__FILE__) . '/../../header.php');
include(dirname(__FILE__) . '/wupayment.php');

if (_PS_VERSION_ > "1.5.0.0") {
    $context = Context::getContext();
    $cart    = $context->cart;
}

$currency  = new Currency(intval(isset($_POST['currency_payement']) ? $_POST['currency_payement'] : $cookie->id_currency));
$total     = floatval(number_format($cart->getOrderTotal(true, 3), 2, '.', ''));
$customer  = new Customer((int) $cart->id_customer);
$mailVars  = array(
    '{wupayment_owner}' => Configuration::get('WUPAYMENT_OWNER'),
    '{wupayment_details}' => nl2br(Configuration::get('WUPAYMENT_DETAILS')),
    '{wupayment_address}' => nl2br(Configuration::get('WUPAYMENT_ADDRESS'))
);
$id_estado = Configuration::get('WUPAYMENT_STATE1');

$wupayment = new WUPayment();

if (_PS_VERSION_ > "1.4.0.0" && _PS_VERSION_ < "1.5.0.0") {
    $wupayment->validateOrder($cart->id, Configuration::get('WUPAYMENT_STATE1'), $total, $wupayment->displayName, NULL, $mailVars, $currency->id, false, $customer->secure_key);
}
if (_PS_VERSION_ > "1.5.0.0") {
    $wupayment->validateOrder((int) $cart->id, Configuration::get('WUPAYMENT_STATE1'), $total, $wupayment->displayName, NULL, $mailVars, (int) $currency->id, false, $customer->secure_key);
    
}
if (_PS_VERSION_ < "1.4.0.0") {
    
    $wupayment->validateOrder($cart->id, Configuration::get('WUPAYMENT_STATE1'), $total, $wupayment->displayName, NULL, $mailVars, $currency->id);
}

$order = new Order($wupayment->currentOrder);
Tools::redirectLink(__PS_BASE_URI__ . 'order-confirmation.php?id_cart=' . $cart->id . '&id_module=' . $wupayment->id . '&id_order=' . $wupayment->currentOrder . '&key=' . $order->secure_key);
?>