<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

<!-- Navigation Bar -->
<nav class="bg-white p-4 shadow-md">
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
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center">Welcome to the Main Page, log in to see collections!</h1>
</div>

</body>
</html>
