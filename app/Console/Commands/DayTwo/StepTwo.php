<?php

namespace App\Console\Commands\DayTwo;

use Illuminate\Console\Command;

class StepTwo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daytwo:steptwo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Day Two Step Two';

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
        $instructions = $this->getInputInstructions();
        $horizontalPosition = 0;
        $verticalPosition = 0;
        $aim = 0;
        foreach ($instructions as $instruction) {
            $individualInstructions = explode(' ', $instruction);
            switch($individualInstructions[0]) {
                case 'forward':
                    $horizontalPosition += $individualInstructions[1];
                    $verticalPosition += ($individualInstructions[1] * $aim);
                    break;
                case 'down':
                    $aim += $individualInstructions[1];
                    break;
                case 'up':
                    $aim -= $individualInstructions[1];
                    break;
            }
        }
        $this->info('Final Measurement is: ' . $horizontalPosition * $verticalPosition);
        return true;
    }

    public function getInputInstructions()
    {
        $txt_file = file_get_contents('app/Console/Commands/Inputs/DayTwo/stepone.txt');
        $rows = explode("\n", $txt_file);
        return array_filter($rows, 'strlen');
    }
}
