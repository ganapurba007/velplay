<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\CheckMembershipStatus;

class CheckMemberships extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'memberships:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and deactive expired memberships';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        CheckMembershipStatus::dispatch();
        $this->info('Memberships check job has been dispatched.');
    }
}
