<?php

namespace App\Http\Controllers;

use Adyen\AdyenException;
use Adyen\Client;
use Adyen\Environment;
use Adyen\Service\Checkout;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * @throws \Exception
     */
    public function makePayment(Request $request)
    {
        try {
            $client = new Client();
            $client->setEnvironment(Environment::TEST);
            $client->setXApiKey(env('ADYEN_PAYMENT_KEY', null));

            $params = $this->prepareParams($request->all());
            $service = new Checkout($client);
            $response = $service->payments($params);

            return response()->json(["response" => $response]);
        }catch (\Exception $e) {

            return response()->json([
                "error" => $e->getMessage(),
                "code" => $e->getCode()
            ], $e->getStatus());
        }
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
                    "currency" => "USD",
                    "value" => 1000
                ],
                "reference" => "YOUR_ORDER_NUMBER",
                "paymentMethod" => [
                    "type"        => "scheme",
                    "number"      => $cardNumber,
                    "expiryMonth" => $month,
                    "expiryYear"  => $year,
                    "cvc"         => $cvv
                ],
                "returnUrl" => "https://your-company.com/checkout?shopperOrder=12xy..",
                "merchantAccount" => env('ADYEN_MARCHANT_ACCOUNT', null)
        ];
        return $data;
    }
}
