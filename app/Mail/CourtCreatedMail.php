<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Court;

class CourtCreatedMail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * @var Court $court
     */
    private $court;

    /**
     * Create a new message instance.
     * @param Court $court
     * @return void
     */
    public function __construct(Court $court)
    {
        $this->court = $court;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'name' => $this->court->name,
            'address' => $this->court->name,
            'state' => $this->court->name,
        ];
        return $this->view('emails.newcourt')->with($data);
    }
}
