<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LicenceExpired extends Mailable
{
    use Queueable, SerializesModels;

    public $licence;

    public function __construct($licence)
    {
        $this->licence = $licence;
    }

    public function build()
    {
        return $this->view('emails.lisence_expired')
            ->subject('Licence Expired - ' . $this->licence->lisansadi);
    }
}
