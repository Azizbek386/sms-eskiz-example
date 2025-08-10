<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class DeleteUnverifiedUsers extends Command
{
    protected $signature = 'users:delete-unverified';
    protected $description = 'Delete users who are not verified within 3 days';

    public function handle()
    {
        $deleted = User::where('is_verified', false)
            ->where('created_at', '<', now()->subDays(3))
            ->delete();

        $this->info("Deleted $deleted unverified users.");
    }
}
