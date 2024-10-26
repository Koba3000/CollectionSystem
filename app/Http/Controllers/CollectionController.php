<?php

namespace App\Http\Controllers;

use App\Repositories\CollectionRepository;
class CollectionController extends Controller
{
    protected $collectionRepository;

    public function __construct(CollectionRepository $collectionRepository)
    {
        $this->collectionRepository = $collectionRepository;
    }

    public function index()
    {
        $collections = $this->collectionRepository->getAllCollections();

        return view('collections.index', compact('collections'));
    }
}
