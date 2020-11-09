<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\RoutineCommittee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DailyRequestStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily_request_status:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status if request date expires!';

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
        RoutineCommittee::where('expired_date','<', now())
            ->where('request_status','active')
            ->update(array('request_status' => 'expired'));
        return 0;
    }
}
