<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeEmail;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;



class JobController extends Controller
{
    public function test()
    {
        $startTime = microtime(true);

        for ($i = 0; $i < 20; $i++) {
            $testMail = new VerifyEmail();
            $sendEmailJob = new SendWelcomeEmail($testMail);
            dispatch($sendEmailJob);
        }

        $endTime = microtime(true);
        $timeExecute = $endTime - $startTime;

        return "Done. Time execute: $timeExecute";
    }
}
