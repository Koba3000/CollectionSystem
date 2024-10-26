<?php

namespace App\Repositories;

use App\Models\Collection;

class CollectionRepository{
    public function getAllCollections()
    {
        return Collection::with('user')
            ->orderBy('end_date', 'desc')
            ->get();
    }

    public function getActiveCollections()
    {
        return Collection::with('user')
            ->where('end_date', '>=', now())
            ->orderBy('end_date', 'asc')
            ->get();
    }
}
