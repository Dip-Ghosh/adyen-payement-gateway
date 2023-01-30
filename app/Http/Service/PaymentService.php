<?php

namespace App\Http\Service;

use Adyen\Client;
use Adyen\Environment;
use Adyen\Service\Checkout;

class PaymentService
{
    CONST ENVIRONMENT = Environment::TEST;

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function makePaymentRequest($params)
    {
        $this->client->setEnvironment(self::ENVIRONMENT);
        $this->client->setXApiKey(env('ADYEN_PAYMENT_KEY', null));

        $service = new Checkout($this->client);

        return $service->payments(  $this->prepareParams($params));

    }


    private function prepareParams($params)
    {
        $cardNumber     = preg_replace('/(?<=\d)\s+(?=\d)/', '', $params['card_number']);
        $cardHolderName = $params['card_holder'];
        $cvv            = $params['cvv'];
        $expire         = explode('/',  $params['expire']);
        $month          = $expire[0];
        $year           = $expire[1];

        $data         = [
            "amount" => [
                "currency" => $params['currency'],
                "value"    => $params['amount'],
            ],
            "reference" => "YOUR_ORDER_NUMBER",
            "paymentMethod" => [
                "type"        => "scheme",
                "number"      => $cardNumber,
                "expiryMonth" => $month,
                "expiryYear"  => $year,
                "cvc"         => $cvv
            ],
            "returnUrl" => env('REDIRECT_URL',null),
            "merchantAccount" => env('ADYEN_MARCHANT_ACCOUNT', null)
        ];
        return $data;
    }
}