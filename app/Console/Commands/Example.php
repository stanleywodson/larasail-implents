<?php

namespace App\Console\Commands;

use App\Events\NotificationEvent;
use App\Events\PrivateEvent;
use App\Jobs\MlaExample;
use App\Models\User;
use App\Notifications\NotificationExample;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class Example extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'example';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    // Queue
    // public function handle()
    // {
    //     for($i =0; $i < 10; $i++){
    //         dispatch(new MlaExample());
    //     }
    // }

    //Notify
    public function handle()
    {
        //One and help
        // $user = User::first();
        // $user->notify(new NotificationExample());

        //Many and facades
        // $users = User::all();
        // Notification::send($users, new NotificationExample());

        //trigger event Broadcastiong
        // event(new NotificationEvent());
        event(new PrivateEvent(User::first()));

    }
}
