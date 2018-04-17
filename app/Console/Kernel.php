<?php

namespace Haricotton\Console;

use Haricotton\Balance;
use Haricotton\Investment;
use Haricotton\Subscription;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function ()
          {
            # code...
            $date = date("Y-m-d");
            $balances = Balance::where('due_date', '<', $date)->get();

            foreach ($balances as $balance) {
              
              $investmentId = $balance->investment->id;
              $subscriptionId = Investment::findOrFail($investmentId)->subscription->id;
              $earningMethod = Investment::findOrFail($investmentId)->earningMethod;
              $interest = Subscription::select($earningMethod)
                        ->where('id', $subscriptionId)->first()->$earningMethod;

              switch ($earningMethod) {
                case 'weeklyEarnings':
                  $date = strtotime(date("Y-m-d", strtotime($date)) . " +1 week");
                  break;
                
                case 'monthlyEarnings':
                  $date = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");
                  break;

                default:
                  $date = strtotime(date("Y-m-d", strtotime($date)) . " +1 day");
                  break;
              }

              $balance->status = 'Accumulated';
              $balance->balance = $balance->balance;        
              $balance->payout = $balance->payout + $interest;
              $balance->due_date = $date;
              $balance->update();
            }


          })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
