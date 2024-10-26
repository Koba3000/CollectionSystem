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
    <div class="container mx-auto flex justify-end">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}" class="text-gray-700 text-sm hover:text-gray-900">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 text-sm hover:text-gray-900 mr-4">Log in</a>
                @endauth
            </div>
        @endif
    </div>
</nav>

<!-- Content -->
<div class="container mx-auto">
    <h1 class="text-4xl font-semibold text-center mb-8 text-gray-800">Collections</h1>
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
                <tr class="border-b border-gray-200 hover:bg-gray-50
                    {{ $collection->end_date < \Carbon\Carbon::now() ? 'bg-red-100' : 'bg-white' }}">
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
