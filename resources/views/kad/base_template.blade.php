<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invitation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .main-card {
            background-image: url('{{ asset('images/N002.png') }}'); /* Replace with your desired background image */
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .overlay {
            background-color: rgba(255, 255, 255, 0.2); /* Semi-transparent white overlay */
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="relative w-full max-w-2xl">
        <div class="main-card flex flex-col justify-center items-center text-center p-8 relative rounded-lg shadow-lg">
            <!-- Overlay for better text readability -->
            <div class="overlay absolute inset-0 rounded-lg"></div>
            
            <!-- Event Title -->
            <h1 class="absolute top-5 text-3xl sm:text-4xl font-bold text-gray-800 z-10">{{ $data['title'] }}</h1>

            <!-- Couple's Names -->
            <div class="relative z-10">
                <p class="text-3xl sm:text-4xl font-serif text-gray-700 font-bold mb-4">{{ $data['bride_name'] }} & {{ $data['groom_name'] }}</p>
            </div>

            <!-- Date -->
            <p class="relative z-10 text-xl sm:text-2xl text-gray-600 mb-4">
                {{ $data['event_day'] }}, {{ $data['event_date'] }} {{ $data['event_month'] }}, {{ $data['event_year'] }}
            </p>

            <!-- Location (example, if needed) -->
            <p class="relative z-10 text-lg sm:text-xl text-gray-500">
                Bukit Beruntung Golf Club, Selangor
            </p>
        </div>
        <div>
            <!-- Overlay for better text readability -->
            <div class="overlay absolute inset-0 rounded-lg"></div>
            
            <!-- Event Title -->
            <h1 class="relative mt-20 text-3xl sm:text-4xl font-bold text-gray-800 mb-6 z-10">{{ $data['title'] }}</h1>

            <!-- Couple's Names -->
            <div class="relative z-10">
                <p class="text-3xl sm:text-4xl font-serif text-gray-700 font-bold mb-4">{{ $data['bride_name'] }} & {{ $data['groom_name'] }}</p>
            </div>

            <!-- Date -->
            <p class="relative z-10 text-xl sm:text-2xl text-gray-600 mb-4">
                {{ $data['event_day'] }}, {{ $data['event_date'] }} {{ $data['event_month'] }}, {{ $data['event_year'] }}
            </p>

            <!-- Location (example, if needed) -->
            <p class="relative z-10 text-lg sm:text-xl text-gray-500">
                Bukit Beruntung Golf Club, Selangor
            </p> 
        </div>
    </div>
</body>
</html>
