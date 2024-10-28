<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Collection</title>
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

<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center mb-6">Create New Collection</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('collections.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Collection Name:</label>
                <input type="text" name="name" id="name" required class="border rounded px-4 py-2 mt-2 w-full">
            </div>
            <div class="mb-4">
                <label for="goal_amount" class="block text-gray-700">Goal Amount:</label>
                <input type="number" name="goal_amount" id="goal_amount" required class="border rounded px-4 py-2 mt-2 w-full">
            </div>
            <div class="mb-4">
                <label for="end_date" class="block text-gray-700">End Date:</label>
                <input type="date" name="end_date" id="end_date" required class="border rounded px-4 py-2 mt-2 w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 hover:bg-blue-600">Create Collection</button>
        </form>
    </div>
</div>
</body>
</html>
