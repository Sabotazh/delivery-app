<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendParcelListener
{
    public function __construct()
    {
    }

    public function handle(SendParcelListener $event): void
    {
//        Model::query()->create([
//            'uuid' => $event->id,
//            'delivery_information' => $event->data['delivery_information']
//        ]);

        //TODO further actions, such as storing in a database or sending an email to the sender
    }
}
