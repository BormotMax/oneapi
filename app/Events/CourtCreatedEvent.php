<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Court;
    
class CourtCreatedEvent
{
    use Dispatchable, SerializesModels;

    /**
     * @var Court $court
     */
    public $court;

    /**
     * Create a new event instance.
     * @param Court $court
     * @return void
     */
    public function __construct(Court $court)
    {
        $this->court = $court;
    }
}
