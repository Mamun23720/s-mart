<?php

namespace App\Jobs;

use App\Mail\SendWelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class CustomerRegistrationEmailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $customerEmail;
    public $otp;
    public function __construct($customerEmail,$otp)
    {
        $this->customerEmail = $customerEmail;
        $this->otp = $otp;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->customerEmail)->send(new SendWelcomeMail($this->otp));

    }
}
