<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold text-gray-800 leading-tight">
            {{ __('Pakej') }}
        </h2>
        <div>
            {{ Breadcrumbs::render('pakej') }}
        </div>
    </x-slot>
    @php
        $package1 = $packages->firstWhere('id', 1);           
        $package2 = $packages->firstWhere('id', 2);
        $package3 = $packages->firstWhere('id', 3);           
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">



                <div class="bg-white py-10 sm:py-16">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                      <div class="mx-auto max-w-4xl text-center">
                        <p class="mt-2 text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-6xl">Pakej Kad Kahwin Digital</p>
                      </div>
                      <p class="mx-auto mt-6 max-w-2xl text-pretty text-center text-lg font-medium text-gray-600 sm:text-xl/8">Kami menawarkan pakej kad kahwin digital PERCUMA!!!. Anda juga boleh memilih pakej berbayar kami yang mempunyai pelbagai fungsi tambahan dengan harga yang berpatutan</p>
                      <div class="isolate mx-auto mt-10 grid max-w-md grid-cols-1 gap-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                        <div class="rounded-3xl p-8 ring-2 ring-pink-600 xl:p-10">
                          <div class="flex items-center justify-between gap-x-4">
                            <h3 id="tier-startup" class="text-4xl/8 font-semibold text-pink-600">{{ $package1->name }}</h3>
                          </div>
                          <p class="mt-4 text-sm/6 text-gray-600">{{ $package1->description }}</p>
                          <p class="mt-6 flex items-baseline gap-x-1">
                            <!-- Price, update based on frequency toggle state -->
                            <span class="text-4xl font-semibold tracking-tight text-gray-900">Rm {{ $package1->price }}</span>
                          </p>
                          <a href="/invitation/{{ $package1->name }}" aria-describedby="tier-startup" class="mt-6 block rounded-md bg-pink-600 px-3 py-2 text-center text-sm/6 font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600">Preview</a>
                          <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-600 xl:mt-10">
                            <li class="flex gap-x-3">
                              <svg class="h-6 w-5 flex-none text-pink-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                              </svg>
                              Jemputan digital Basic
                            </li>
                            <li class="flex gap-x-3">
                              <svg class="h-6 w-5 flex-none text-pink-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                              </svg>
                              Boleh terus diedarkan kepada tetamu
                            </li>
                          </ul>
                        </div>
                        <div class="rounded-3xl p-8 ring-2 ring-purple-600 xl:p-10">
                            <div class="flex items-center justify-between gap-x-4">
                              <h3 id="tier-startup" class="text-4xl/8 font-semibold text-purple-600">{{ $package2->name }}</h3>
                              <p class="rounded-full bg-indigo-600/10 px-2.5 py-1 text-xs/5 font-semibold text-gray-600">Most popular</p>
                            </div>
                            <p class="mt-4 text-sm/6 text-gray-600">{{ $package2->description }}</p>
                            <p class="mt-6 flex items-baseline gap-x-1">
                              <!-- Price, update based on frequency toggle state -->
                              <span class="text-4xl font-semibold tracking-tight text-gray-900">Rm {{ $package2->price }}</span>
                            </p>
                            <a href="/invitation/{{ $package2->name }}" aria-describedby="tier-startup" class="mt-6 block rounded-md bg-purple-600 px-3 py-2 text-center text-sm/6 font-semibold text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">Preview</a>
                            <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-600 xl:mt-10">
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Countdown Timer
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Google Calendar & Apple Calendar
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Doa Pengantin 
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Panggilan & Whatsapp
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Google Maps & Waze
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Aturcara Majlis
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Slideshow
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Guestbook
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                Muzik Latar
                              </li>
                              <li class="flex gap-x-3">
                                <svg class="h-6 w-5 flex-none text-purple-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                </svg>
                                RSVP 
                              </li>
                            </ul>
                          </div>
                          <div class="rounded-3xl p-8 ring-2 ring-green-600 xl:p-10">
                            <div class="flex items-center justify-between gap-x-4">
                              <h3 id="tier-startup" class="text-4xl/8 font-semibold text-green-600">{{ $package3->name }}</h3>
                            </div>
                            <p class="mt-4 text-sm/6 text-gray-600">{{ $package3->description }}</p>
                            <p class="mt-6 flex items-baseline gap-x-1">
                              <!-- Price, update based on frequency toggle state -->
                              <span class="text-4xl font-semibold tracking-tight text-gray-900">Rm {{ $package3->price }}</span>
                            </p>
                            <a href="/invitation/{{ $package3->name }}" aria-describedby="tier-startup" class="mt-6 block rounded-md bg-green-600 px-3 py-2 text-center text-sm/6 font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Preview</a>
                            <ul role="list" class="mt-8 space-y-3 text-sm/6 text-gray-600 xl:mt-10">
                                <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Countdown Timer
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Google Calendar & Apple Calendar
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Doa Pengantin 
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Panggilan & Whatsapp
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Google Maps & Waze
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Aturcara Majlis
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Slideshow
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Guestbook
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Muzik Latar
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    RSVP 
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Option Dua Pasangan 
                                  </li>
                                  <li class="flex gap-x-3">
                                    <svg class="h-6 w-5 flex-none text-green-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                      <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                                    </svg>
                                    Money Gift 
                                  </li>
                            </ul>
                          </div>

                      </div>
                    </div>
                  </div>
                  



            </div>
        </div>
    </div>
</x-app-layout>
