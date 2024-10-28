<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $collection->name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

<!-- Navigation Bar -->
<nav class="bg-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="/collections" class="text-gray-700 text-sm hover:text-gray-900">Collections</a>
        </div>
        <div class="flex items-center space-x-4">
            @if (auth()->check())
                <span class="text-gray-700 text-sm mr-4"> {{ auth()->user()->name }} (Points: {{ auth()->user()->points }})</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 text-sm hover:text-gray-900">Log out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 text-sm hover:text-gray-900 mr-4">Log in</a>
            @endif
        </div>
    </div>
</nav>

<!-- Collection Content -->
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center mb-6">Collection Details</h1>

    <!-- Collection Information -->
    <div class="bg-white p-6 rounded-lg shadow-md mt-6">
        <p><strong>Collection Name:</strong> {{ $collection->name }}</p>
        <p><strong>Target Amount:</strong> {{ $collection->goal_amount }}</p>
        <p><strong>Gathered Amount:</strong> {{ $collection->current_amount }}</p>
        <p><strong>End Date:</strong> {{ $collection->end_date }}</p>
        <p><strong>Organizer:</strong> {{ $collection->user->name }}</p>
    </div>

    <!-- Error Message -->
    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded mt-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- Contribution Form -->
    @if (auth()->check())
        <div class="mt-6">
            <form action="/collections/{{ $collection->collection_id }}/contribute" method="POST">
                @csrf
                <label for="points" class="block text-gray-700">Enter Points to Contribute:</label>
                <input type="number" name="points" id="points" min="1" max="{{ auth()->user()->points }}" required class="border rounded px-4 py-2 mt-2 w-full">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 hover:bg-blue-600">Contribute Points</button>
            </form>
        </div>
    @else
        <p class="text-center text-red-500 mt-6">Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">log in</a> to contribute points.</p>
    @endif
</div>

</body>
</html>
