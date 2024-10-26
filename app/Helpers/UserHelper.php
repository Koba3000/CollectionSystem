<?php
namespace App\Helpers;

use App\Models\User;

class UserHelper
{
    /**
     * Get a random user_id within a specified range.
     *
     * @param int $min
     * @param int $max
     * @return int|null
     */
    public static function getRandomUserId(): ?int
    {
        $minId = User::min('user_id');
        $maxId = User::max('user_id');

        return User::whereBetween('user_id', [$minId, $maxId])->inRandomOrder()->value('user_id');
    }
}
