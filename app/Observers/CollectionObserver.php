<?php

namespace App\Observers;

use App\Models\Collection;
use App\Notifications\PointsReceivedNotification;

class CollectionObserver
{
    public function updated(Collection $collection)
    {
        if ($collection->wasChanged('current_amount')) {
            $collection->user->notify(new PointsReceivedNotification($collection->current_amount));
        }
    }
}
