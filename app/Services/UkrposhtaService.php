<?php

namespace App\Services;

use App\Events\ParcelSentEvent;
use Illuminate\Support\Facades\Http;

class UkrposhtaService implements DeliveryServiceInterface
{

    public function sendInformationByApi(array $request): void
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer {bearer_Uuid}',
            'Content-Type' => 'application/json'
        ])->post('https://www.ukrposhta.ua/ecom/shipments?token={token}', [
            'sender' => $request['sender'],
            'recipient' => $request['recipient'],
            'parcel_information' => $request['parcel_information'],
        ]);

        $response->successful()
            ? ParcelSentEvent::dispatch($response->body(), $request['id'])
            : exec("/dev/null 2>&1"); //TODO something else if processing fails;
    }
}
