<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AssignPoints extends Command
{
    protected $signature = 'assign:points {points} {user_id?}';

    protected $description = 'Assign points to a specific user or all users if no user_id is provided';

    public function handle()
    {
        $points = $this->argument('points');
        $userId = $this->argument('user_id');

        if (!is_numeric($points) || $points <= 0) {
            $this->error('Points must be a positive number.');
            return;
        }

        if ($userId) {
            $user = User::find($userId);
            if ($user) {
                $user->points += $points;
                $user->save();
                $this->info("Added {$points} points to user ID {$userId}.");
            } else {
                $this->error('User not found.');
            }
        } else {
            $users = User::all();
            foreach ($users as $user) {
                $user->points += $points;
                $user->save();
            }
            $this->info("Added {$points} points to all users.");
        }
    }
}
