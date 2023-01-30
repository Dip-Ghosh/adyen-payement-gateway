<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentValidationRequest;
use App\Http\Service\PaymentService;


class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function makePayment(PaymentValidationRequest $request)
    {
        try {
            $params = $this->paymentService->makePaymentRequest($request->all());

            return response()->json(["response" => $response]);
        }catch (\Exception $e) {

            return response()->json([
                "error" => $e->getMessage(),
                "code" => $e->getCode()
            ], $e->getStatus());
        }
    }


}
