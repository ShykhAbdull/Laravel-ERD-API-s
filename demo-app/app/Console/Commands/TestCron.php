<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TestCron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        try{
        $data = array('data' => 'Testing Cron');

        Mail::send('mail', $data, function($msg){
            $msg->to("mynameisshaikh20@gmail.com")->subject("Cron testing mail");
        });
        Log::info('Mail sent successfully');
        return true;
        
    }
        catch(Exception $e){
            Log::error('Mail failed to send: ' . $e->getMessage());
            return false;
        }
    }
}
