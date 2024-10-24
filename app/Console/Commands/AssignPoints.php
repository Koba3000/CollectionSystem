<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AssignPoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:points {points} {user_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign points to a specific user or all users if no user_id is provided';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $points = $this->argument('points');
        $userId = $this->argument('user_id');

        // Walidacja liczby punktów
        if (!is_numeric($points) || $points <= 0) {
            $this->error('Points must be a positive number.');
            return;
        }

        // Jeśli podano user_id, przypisz punkty do konkretnego użytkownika
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
            // Jeśli nie podano user_id, przypisz punkty wszystkim użytkownikom
            $users = User::all();
            foreach ($users as $user) {
                $user->points += $points;
                $user->save();
            }
            $this->info("Added {$points} points to all users.");
        }
    }
}
