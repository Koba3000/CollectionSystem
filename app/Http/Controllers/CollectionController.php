<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Repositories\CollectionRepository;
use Illuminate\Http\Request;

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

    public function show($collection_id)
    {
        $collection = Collection::with('user')->findOrFail($collection_id);

        return view('collections.show', compact('collection'));
    }

    public function contribute(Request $request, $collection_id)
    {
        $request->validate([
            'points' => 'required|integer|min:1'
        ]);

        $collection = Collection::findOrFail($collection_id);
        $user = auth()->user();

        if ($user->points >= $request->points) {
            $user->points -= $request->points;
            $user->save();

            $collection->current_amount += $request->points;
            $collection->save();

            return redirect()->route('collections.show', $collection->collection_id)->with('success', 'Points contributed successfully!');
        } else {
            return redirect()->back()->withErrors(['points' => 'You do not have enough points.']);
        }
    }

}
