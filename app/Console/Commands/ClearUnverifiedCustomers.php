<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customers;

class ClearUnverifiedCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my-command:clear-unverified-customers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Customers::where('is_verified','==1',true)->delete();
        $this->info('Clear unverified users!');
        return Command::SUCCESS;
    }
}
