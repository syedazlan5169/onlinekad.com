<!-- resources/views/n002.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N002</title>
    @vite('resources/css/app.css') <!-- Assuming you're using Laravel Mix or Vite for TailwindCSS -->
    @livewireStyles <!-- Livewire Styles -->
</head>
<body class="bg-gray-50">

<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900">
            Wedding Invitation
        </h1>
    </div>
</header>

<!-- Hero Section -->
<section class="relative bg-cover bg-center h-96" style="background-image: url('{{ asset('images/N002.webp') }}');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative flex items-center justify-center h-full">
        <div class="text-center text-white">
            <h2 class="text-4xl font-bold">We Are Getting Married</h2>
            <p class="mt-4 text-xl">Join us in celebrating this beautiful occasion.</p>
        </div>
    </div>
</section>

<!-- Countdown -->
<section class="my-12 text-center">
    <h2 class="text-2xl font-semibold">Menanti Hari</h2>
    <div id="countdown" class="text-3xl font-bold mt-4">
        <span id="days">0</span> Day(s) : 
        <span id="hours">0</span> Hour(s) : 
        <span id="minutes">0</span> Minute(s) : 
        <span id="seconds">0</span> Second(s)
    </div>
</section>

<!-- Doa Section -->
<section class="my-12 px-4 text-center">
    <h2 class="text-2xl font-semibold">Doa Untuk Pengantin</h2>
    <blockquote class="mt-4 italic text-lg">
        “Ya Allah, berkatilah majlis perkahwinan ini, limpahkan baraqah dan rahmat kepada kedua mempelai ini...”
    </blockquote>
</section>

<!-- Image Gallery -->
<section class="my-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <img src="https://live.onlinekad.com/wp-content/uploads/slider2/wed8.webp" alt="Wedding image 1" class="w-full rounded-lg">
    <img src="https://live.onlinekad.com/wp-content/uploads/slider2/wed3.webp" alt="Wedding image 2" class="w-full rounded-lg">
    <img src="https://live.onlinekad.com/wp-content/uploads/slider2/wed1.webp" alt="Wedding image 3" class="w-full rounded-lg">
</section>

<!-- RSVP Form -->
<section id="rsvp" class="my-12 max-w-2xl mx-auto px-4">
    <h2 class="text-2xl font-semibold text-center">RSVP</h2>
    <form wire:submit.prevent="submitRSVP" class="mt-6 space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="name" wire:model="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Nombor Telefon</label>
            <input type="text" id="phone" wire:model="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label for="kehadiran" class="block text-sm font-medium text-gray-700">Kehadiran</label>
            <select id="kehadiran" wire:model="attendance" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <div>
            <label for="jumlah_kehadiran" class="block text-sm font-medium text-gray-700">Jumlah Kehadiran</label>
            <input type="number" id="jumlah_kehadiran" wire:model="guest_count" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div class="text-center">
            <button type="submit" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Submit RSVP</button>
        </div>
    </form>
</section>

<!-- Guestbook -->
<section class="my-12 max-w-4xl mx-auto px-4">
    <h2 class="text-2xl font-semibold text-center">Guestbook</h2>
    <div class="mt-6 space-y-4">
        <p><strong>Azlan:</strong> Tahniah!!</p>
        <p><strong>Najwa:</strong> Selamat pengantin baru</p>
        <p><strong>Murni:</strong> All the best</p>
        <p><strong>Yusuf:</strong> Till Jannah</p>
    </div>
</section>

<!-- Footer Contact Information -->
<footer class="mt-12 text-center">
    <p class="text-gray-600">Created by: www.onlinekad.com</p>
    <div class="mt-4">
        <a href="tel:0108323516" class="text-indigo-600">Rahman (Ayah)</a> | 
        <a href="tel:0108323516" class="text-indigo-600">Sarimah (Emak)</a>
    </div>
</footer>

@livewireScripts <!-- Livewire Scripts -->
<script>
    // Countdown logic can be added here
</script>
</body>
</html>
