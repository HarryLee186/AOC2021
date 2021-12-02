<?php

namespace App\Console\Commands\DayOne;

use Illuminate\Console\Command;

class StepOne extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dayone:stepone';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Day One Step One';

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
        $numbers = $this->getInputNumbers();
        $count = 0;
        foreach($numbers as $key => $number) {
            if($key === 0) {
                continue;
            }
            if($number > $numbers[$key - 1]) {
                $count++;
            }
        }
        $this->info('Count is: ' . $count);
        return true;
    }

    public function getInputNumbers()
    {
        $txt_file = file_get_contents('app/Console/Commands/Inputs/DayOne/stepone.txt');
        $rows = explode("\n", $txt_file);
        return array_filter($rows, 'strlen');
    }
}
