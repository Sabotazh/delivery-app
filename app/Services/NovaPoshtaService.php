<?php

namespace App\Services;

use App\Events\ParcelSentEvent;
use Illuminate\Support\Facades\Http;

class NovaPoshtaService implements DeliveryServiceInterface
{

    public function sendInformationByApi(array $request): void
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic {$token}',
            'Content-Type' => 'application/json'
        ])->post('api.novaposhta.international', [
            'sender' => $request['sender'],
            'recipient' => $request['recipient'],
            'parcel_information' => $request['parcel_information'],
        ]);

        $response->successful()
            ? ParcelSentEvent::dispatch($response->body(), $request['id'])
            : exec("/dev/null 2>&1"); //TODO something else if processing fails;
    }
}
