<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::POST('/payment', function () {
    $client = new \Adyen\Client();
    $client->setXApiKey("YOUR_X-API-KEY");
    $service = new \Adyen\Service\Checkout($client);

    $params = array(
        "amount" => array(
            "currency" => "USD",
            "value" => 1000
        ),
        "reference" => "YOUR_ORDER_NUMBER",
        "paymentMethod" => array(
            "type" => "scheme",
            "encryptedCardNumber" => "adyenjs_0_1_18$MT6ppy0FAMVMLH...",
            "encryptedExpiryMonth" => "adyenjs_0_1_18$MT6ppy0FAMVMLH...",
            "encryptedExpiryYear" => "adyenjs_0_1_18$MT6ppy0FAMVMLH...",
            "encryptedSecurityCode" => "adyenjs_0_1_18$MT6ppy0FAMVMLH...",
            "holderName" => "S. Hopper"
        ),
        "returnUrl" => "https://your-company.com/...",
        "merchantAccount" => "YOUR_MERCHANT_ACCOUNT"
    );
    $result = $service->payments($params);
})