<?php

namespace App\Http\Service;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Environment;
use Adyen\Service\Checkout;

class PaymentService
{
    CONST ENVIRONMENT = Environment::TEST;

    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function makePaymentRequest($params): array
    {
        $this->client->setEnvironment(self::ENVIRONMENT);
        $this->client->setXApiKey(env('ADYEN_PAYMENT_KEY', null));
        $service = new Checkout($this->client);

        return $service->payments(  $this->prepareParams($params));
    }

    private function prepareParams($params): array
    {
        return [
            "amount"          => $this->prepareAmountParams($params),
            "reference"       => "YOUR_ORDER_NUMBER",
            "paymentMethod"   => $this->preparePaymentParams($params),
            "returnUrl"       => env('REDIRECT_URL',null),
            "merchantAccount" => env('ADYEN_MARCHANT_ACCOUNT', null),
        ];
    }

    private function preparePaymentParams($params): array
    {
        $cardNumber     = preg_replace('/(?<=\d)\s+(?=\d)/', '', $params['card_number']);
        $cardHolderName = $params['card_holder'];
        $cvv            = $params['cvv'];
        $expire         = explode('/',  $params['expire']);

        return [
                "type"        => "scheme",
                "number"      => $cardNumber,
                "expiryMonth" => $expire[0],
                "expiryYear"  => $expire[1],
                "cvc"         => $cvv,
        ];
    }

    private function prepareAmountParams($params): array
    {
       return [
           "currency" => $params['currency'],
            "value"   => $params['amount'],
           ];
    }
}