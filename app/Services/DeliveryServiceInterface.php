<?php

namespace App\Services;

interface DeliveryServiceInterface
{
    public function sendInformationByApi(array $request);
}
