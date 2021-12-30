<?php

namespace App\Console\Commands;


use App\Models\User;
use App\Notifications\NotifyInactiveUser;
use Illuminate\Console\Command;

class InactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inactive:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an notification of inactive users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
           $user_status = User::where('status', 1)->get();
            foreach ($user_status as $user) {
                $user->notify(new NotifyInactiveUser());
           
        }
        
    
        
    }
}
