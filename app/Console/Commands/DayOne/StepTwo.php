<?php

namespace App\Console\Commands\DayOne;

use Illuminate\Console\Command;

class StepTwo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dayone:steptwo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Day One Step Two';

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
     * Had to look this one up, seems weirdly simple once I saw it though
     * @return int
     */
    public function handle()
    {
        $numbers = $this->getInputNumbers();
        $length = count($numbers); //Get the amount of elements in our array
        $count = 0;
        for($i = 3; $i < $length; ++$i) {
            if($numbers[$i] > ($numbers[$i - 3])) {
                print_r($count++ . " ");
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
