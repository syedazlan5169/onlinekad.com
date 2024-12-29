<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white  border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('/') }}" wire:navigate>
                        <x-application-logo class="block w-auto fill-current text-gray-8000" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('/')" :active="request()->routeIs('/')" wire:navigate>
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('katalog.show')" :active="request()->routeIs('katalog.show')" wire:navigate>
                        {{ __('Katalog') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('pakej.show')" :active="request()->routeIs('pakej.show')" wire:navigate>
                        {{ __('Pakej') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('tutorial.show')" :active="request()->routeIs('tutorial.show')" wire:navigate>
                        {{ __('Tutorial') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('tutorial.show')" :active="request()->routeIs('tutorial.show')" wire:navigate>
                        {{ __('Maklumbalas') }}
                    </x-nav-link>
                </div>
                @auth
                @if (Auth::user()->is_admin)
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('admin.show')" :active="request()->routeIs('admin.show')" wire:navigate>
                            {{ __('Admin') }}
                        </x-nav-link>
                    </div>
                @endif
                @endauth
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- When the user is logged in -->
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
            
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
            
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('senarai-kad.show')" wire:navigate>
                            {{ __('Senarai Kad') }}
                        </x-dropdown-link>
            
                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
                @endauth
            
                <!-- When the user is not logged in -->
                @guest
                <a
                    href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                >
                    Log in
                </a>
            
                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                    >
                        Register
                    </a>
                @endif
                @endguest
            </div>
            

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400  hover:text-gray-500  hover:bg-gray-100 focus:outline-none focus:bg-gray-100  focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="bg-gray-100 hidden sm:hidden">
        <!-- When the user is logged in -->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('/')" :active="request()->routeIs('/')" wire:navigate>
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('katalog.show')" :active="request()->routeIs('katalog.show')" wire:navigate>
                {{ __('Katalog') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pakej.show')" :active="request()->routeIs('pakej.show')" wire:navigate>
                {{ __('Pakej') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tutorial.show')" :active="request()->routeIs('tutorial.show')" wire:navigate>
                {{ __('Tutorial') }}
            </x-responsive-nav-link>
            @auth
            @if (Auth::user()->is_admin)
                <x-responsive-nav-link :href="route('admin.show')" :active="request()->routeIs('admin.show')" wire:navigate>
                    {{ __('Admin') }}
                </x-responsive-nav-link>
            @endif
            @endauth
        </div>
    
        @auth
        <!-- Responsive Settings Options for Logged In Users -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>
    
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" :active="request()->routeIs('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('senarai-kad.show')" :active="request()->routeIs('senarai-kad.show')" wire:navigate>
                    {{ __('Senarai Kad') }}
                </x-responsive-nav-link>
    
                <!-- Log Out Option -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
        @endauth
    
        <!-- When the user is not logged in -->
        @guest
        <div class="pt-2 pb-3 space-y-1 border-gray-200">
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')" wire:navigate>
                {{ __('Log in') }}
            </x-responsive-nav-link>
    
            @if (Route::has('register'))
            <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')" wire:navigate>
                {{ __('Register') }}
            </x-responsive-nav-link>
            @endif
        </div>
        @endguest
    </div>
    
</nav>
