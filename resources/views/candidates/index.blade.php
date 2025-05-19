<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidates') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-5">
        @if (session('success'))
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center p-4 mb-4 bg-emerald-500 text-white rounded-2xl">
                    <i class="fa-solid fa-circle-check"></i>
                    <div class="ml-3 text-sm font-reguler">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        @if (session('failed'))
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center p-4 mb-4 bg-red-500 text-white rounded-2xl">
                    <i class="fa-solid fa-circle-check"></i>
                    <div class="ml-3 text-sm font-reguler">
                        {{ session('failed') }}
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center p-4 mb-4 bg-red-500 text-white rounded-2xl">
                    <i class="fa-solid fa-circle-check"></i>
                    <div class="ml-3 text-sm font-reguler">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="max-w-7xl lg:mx-auto mx-5 sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('candidates.create') }}"
                class="hover:bg-sky-100 border border-sky-500 text-sky-500 px-4 py-2 rounded-2xl">Create</a>

            <div class="flex justify-center bg-white p-6 rounded-3xl shadow-xl">
                <div class="p-0 " style="width:100%;overflow-x:auto;">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                        <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                            <!-- Form untuk entries -->
                            <x-show-entries :route="route('candidates.index')" :search="request()->search">
                            </x-show-entries>
                        </div>

                        <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                            <form action="{{ route('candidates.index') }}" method="GET"
                                class="flex items-center flex-1">
                                <input type="text" name="search" placeholder="Enter for search . . . "
                                    id="search" value="{{ request('search') }}"
                                    class="w-56 relative inline-flex items-center px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300"
                                    oninput="this.value = this.value.toUpperCase();" />

                                <input type="hidden" name="entries" value="{{ request('entries', 10) }}">
                                <input type="hidden" name="page" value="{{ request('page', 1) }}">
                            </form>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto rounded-lg shadow-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                            <thead
                                class="text-md font-bold text-gray-700 uppercase py-[100px] dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        PERIOD
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        ORGANIZATION
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        NAME
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        DESCRIPTION
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        VISION
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        MISION
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        LOGO
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        VIDEO
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        STATUS
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = $candidates->firstItem();
                                @endphp
                                @forelse($candidates as $key => $candidate)
                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4 text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td class="px-6 py-4 text-center bg-gray-100">
                                            {{ $candidate->period->name ?? 'Unknown' }}
                                        </td>
                                        <td class="px-6 py-4 text-left">
                                            {{ $candidate->organization->name ?? 'Unknown' }}
                                        </td>
                                        <td class="px-6 py-4 bg-gray-100 text-center">
                                            {{ $candidate->name }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $candidate->description }}
                                        </td>
                                        <td class="px-6 py-4 text-center bg-gray-100">
                                            {{ $candidate->vision }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $candidate->mision }}
                                        </td>
                                        <td class="px-6 py-4 text-center bg-gray-100">
                                            @if ($candidate->logo)
                                                <img src="{{ asset('storage/' . $candidate->logo) }}" alt="Logo"
                                                    class="w-20 h-20">
                                            @else
                                                No Logo
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @if ($candidate->video)
                                                <a target="_blank"
                                                    href="https://www.youtube.com/watch?v={{ $candidate->video }}">Look!</a>
                                            @else
                                                No Video
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center bg-gray-100">
                                            {{ $candidate->is_active ? 'Active' : 'Non Active' }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ route('candidates.show', $candidate->id) }}" class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-sky-100 border border-dashed border-sky-500 text-sky-500 pl-4 pr-4 pt-2">Show</a>
                                            <a href="{{ route('candidates.edit', $candidate->id) }}" class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-amber-100 border border-dashed border-amber-500 text-amber-500 pl-4 pr-4 pt-2">Edit</a>
                                            <form action="{{ route('candidates.destroy', $candidate->id) }}"
                                                method="POST" class="inline"
                                                onclick="return confirm('Are you sure you want to delete this item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-red-100 border border-dashed border-red-500 text-red-500 pl-4 pr-4 pt-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="bg-gray-500 text-white p-3 rounded shadow-sm mb-3">
                                        Data Belum Tersedia!
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        @if ($candidates->hasPages())
                            {{ $candidates->appends(request()->query())->links('vendor.pagination.custom') }}
                        @else
                            <div class="flex items-center justify-between">
                                <nav class="flex justify-start">
                                    <div class="text-sm flex gap-1">
                                        <div>Showing</div>
                                        <div class="font-bold">1</div>
                                        <div>to</div>
                                        <div class="font-bold">{{ count($candidates) }}</div>
                                        <div>of</div>
                                        <div class="font-bold">{{ count($candidates) }}</div>
                                        <div>entries</div>
                                    </div>
                                </nav>
                                <div class="flex items-center space-x-2">
                                    <div class="flex">
                                        <div class="border px-4 py-1 rounded-l-lg">&lt;</div>
                                        <div class="border px-4 py-1">1</div>
                                        <div class="border px-4 py-1 rounded-r-lg">&gt;</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
