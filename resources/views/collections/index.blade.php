<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

<!-- Navigation Bar -->
<nav class="bg-white p-4 shadow-md mb-6">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="/collections" class="text-gray-700 text-sm hover:text-gray-900">Collections</a>
        </div>
        <div class="flex items-center space-x-4">
            @if (auth()->check())
                <span class="text-gray-700 text-sm"> {{ auth()->user()->name }} (Points: {{ auth()->user()->points }})</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 text-sm hover:text-gray-900">Log out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 text-sm hover:text-gray-900">Log in</a>
            @endif
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-4xl font-semibold text-gray-800">Collections</h1>
        <a href="/collections/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Collection
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="table-auto w-full bg-white shadow-lg rounded-lg border border-gray-200">
            <thead>
            <tr class="bg-gray-700 text-white uppercase text-md font-medium tracking-wide">
                <th class="px-6 py-4 text-left">Collection Name</th>
                <th class="px-6 py-4 text-left">Ends At</th>
                <th class="px-6 py-4 text-left">Target Amount</th>
                <th class="px-6 py-4 text-left">Gathered Amount</th>
                <th class="px-6 py-4 text-left">Formulator Email</th>
            </tr>
            </thead>
            <tbody class="text-gray-700 text-md">
            @foreach($collections as $collection)
                <tr class="border-b border-gray-200 hover:bg-gray-50 cursor-pointer
                    {{ $collection->end_date < \Carbon\Carbon::now() ? 'bg-red-100' : 'bg-white' }}"
                    onclick="window.location.href='/collections/{{ $collection->collection_id }}'">
                    <td class="px-6 py-4">{{ $collection->name }}</td>
                    <td class="px-6 py-4">{{ $collection->end_date->format('Y-m-d') }}</td>
                    <td class="px-6 py-4">{{ $collection->goal_amount }}</td>
                    <td class="px-6 py-4">{{ $collection->current_amount }}</td>
                    <td class="px-6 py-4">{{ $collection->user->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
