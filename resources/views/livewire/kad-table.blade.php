<div>
                                       <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                    <span class="sr-only">Delete</span>
                                                </th>
                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Kad Id</th>
                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">User</th>
                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Package</th>
                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Payment</th>
                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Design</th>
                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @foreach($kads as $kad)
                                            <tr>
                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                    <button x-on:click="deleteModal = true; selectedUserId='{{ $kad->id }}'" class="text-red-600 hover:text-red-900">
                                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </td>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium border border-l text-gray-900 sm:pl-6">{{ $kad->id }}</td>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium border border-l text-gray-900 sm:pl-6">{{ $kad->user->name }}</td>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium border border-l text-gray-900 sm:pl-6">
                                                    @if($kad->package->name == 'Basic')
                                                        <span class="inline-flex items-center rounded-full bg-pink-50 px-2 py-1 text-xs font-medium text-pink-700 ring-1 ring-inset ring-pink-600/20">
                                                            Basic
                                                        </span>
                                                    @elseif($kad->package->name == 'Premium')
                                                        <span class="inline-flex items-center rounded-full bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-600/20">
                                                            Premium
                                                        </span>
                                                    @else($kad->package->name == 'Deluxe')
                                                        <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                                            Deluxe
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium border border-l text-gray-900 sm:pl-6">
                                                    @if($kad->is_paid)

                                                        <!-- Paid Badge -->
                                                        <span class="inline-flex items-center rounded-full bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                                            Paid
                                                        </span>
                                                    @else
                                                        <!-- Unpaid Badge -->
                                                        <span class="inline-flex items-center rounded-full bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">
                                                            Unpaid
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium border border-l text-gray-900 sm:pl-6">{{ $kad->design->design_code }}</td>
                                                @if ($kad->dua_pasangan_is_on)
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium border border-l text-gray-900 sm:pl-6">{{ $kad->nama_panggilan_pasangan_pertama }} & {{ $kad->nama_panggilan_pasangan_kedua}}</td>
                                                @elseif ($kad->penjemput == 2)
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium border border-l text-gray-900 sm:pl-6">{{ $kad->nama_panggilan_perempuan }} & {{ $kad->nama_panggilan_lelaki }}</td>
                                                @else
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium border border-l text-gray-900 sm:pl-6">{{ $kad->nama_panggilan_lelaki }} & {{ $kad->nama_panggilan_perempuan }}</td>
                                                @endif
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium border border-l sm:pl-6"><a class="text-blue-500" href="/invitation/{{ $kad->slug }}">View</a><a class="ml-2 text-green-500" href="/kad-edit/{{ $kad->id }}">Edit</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
</div>
