<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentValidationRequest;
use App\Http\Service\PaymentService;

class PaymentController extends Controller
{
    protected PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function makePayment(PaymentValidationRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            return response()->json([
                "response" => $this->paymentService->makePaymentRequest($request->all())
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                "error" => $e->getMessage(),
                "code" => $e->getCode()
            ], $e->getStatus());
        }
    }
}
