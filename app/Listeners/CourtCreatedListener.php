<?php

namespace App\Listeners;

use App\Events\CourtCreatedEvent;
use App\Mail\CourtCreatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class CourtCreatedListener implements ShouldQueue
{
    /**
     * The name of the connection the job should be sent to.
     *
     * @var string|null
     */
    public $connection = 'database';

    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'listeners';

    /**
     * Handle the event.
     *
     * @param  \App\Events\CourtCreatedEvent  $event
     * @return void
     */
    public function handle(CourtCreatedEvent $event)
    {
        $adminMail = config('mail.admin_mail');
        Mail::to($adminMail)->send(new CourtCreatedMail($event->court));
    }
}