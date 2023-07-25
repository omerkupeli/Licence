<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\LicenceExpired;
use App\Models\Licence;

class LicenceExpirationCheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $expiredLicences = Licence::where('bitiştarihi', '<', now())->get();

        foreach ($expiredLicences as $licence) {
            // E-posta gönderme işlemi
            Mail::to($licence->email)->send(new LicenceExpired($licence));
        }
    }
}
