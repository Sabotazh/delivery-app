<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryRequest;

class DeliveryController extends Controller
{
    public function __invoke(DeliveryRequest $request): void
    {
        $validatedData = $request->validated();

        $service = 'App\Services\\' . $validatedData['delivery_service'] . 'Service';

        (new $service())->sendInformationByApi($validatedData);
    }
}
