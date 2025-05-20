<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Card Votes') }}
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
            {{-- <a href="{{ route('cardvotes.create') }}">Create</a>
            <a href="{{ route('cardvotes.import') }}">Import</a> --}}

            {{-- <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Period</th>
                        <th>User</th>
                        <th>Organization</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cardvotes as $key => $cardvote)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $cardvote->period->name ?? 'Unknown' }}</td>
                            <td>{{ $cardvote->user->name ?? 'Unknown' }}</td>
                            <td>{{ $cardvote->organization->name ?? 'Unknown' }}</td>
                            <td>
                                <a href="{{ route('cardvotes.edit', $cardvote->id) }}">Edit</a>
                                <form action="{{ route('cardvotes.destroy', $cardvote->id) }}" method="POST"
                                    class="inline"
                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Not found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table> --}}

            <div class="flex gap-5">
                <div class="mt-4 w-32">
                    <a href="{{ route('cardvotes.create') }}"
                        class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-sky-100 border border-dashed border-sky-500 text-sky-500 pl-4 pr-4 pt-2"><i
                            class="fi fi-sr-add mr-2 text-lg"></i> <span>Input User</span></a>
                </div>
                <div class="mt-4 w-36">
                    <a href="{{ route('cardvotes.import') }}"
                        class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-emerald-100 border border-dashed border-emerald-500 text-emerald-500 pl-4 pr-4 pt-2"><i
                            class="fi fi-sr-file-import mr-2 text-lg"></i> <span>Import User</span></a>
                </div>
            </div>
            <div class="flex justify-center bg-white p-6 rounded-3xl shadow-xl">
                <div class="p-0 " style="width:100%;overflow-x:auto;">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                        <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                            <!-- Form untuk entries -->
                            <x-show-entries :route="route('cardvotes.index')" :search="request()->search">
                            </x-show-entries>
                        </div>

                        <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                            <form action="{{ route('cardvotes.index') }}" method="GET"
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
                                        USER
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center bg-gray-100">
                                        ORGANIZATION
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = $cardvotes->firstItem();
                                @endphp
                                @forelse($cardvotes as $key => $cardvote)
                                    <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4 text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td class="px-6 py-4 text-center bg-gray-100">
                                            {{ $cardvote->period->name ?? 'Unknown' }}
                                        </td>
                                        <td class="px-6 py-4 text-left">
                                            {{ $cardvote->user->name ?? 'Unknown' }}
                                        </td>
                                        <td class="px-6 py-4 text-left bg-gray-100 text-center">
                                            {{ $cardvote->organization->name ?? 'Unknown' }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ route('cardvotes.edit', $cardvote->id) }}"
                                                class="mr-2 hover:bg-amber-100 text-amber-600 pr-2 pl-3 py-[11px] rounded-xl text-xs border-2 border-dashed border-amber-600"
                                                title="Update Jadwal Pembelajaran">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>

                                            <form action="{{ route('cardvotes.destroy', $cardvote->id) }}"
                                                method="POST" class="inline"
                                                onclick="return confirm('Are you sure you want to delete this item?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Hapus Data"
                                                    class="mt-5 lg:mt-0 border-2 border-dashed border-red-500 text-red-500 hover:bg-red-100 px-3 py-1 rounded-xl h-10 w-10 text-xs"><i
                                                        class="fas fa-trash"></i></button>
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
                        @if ($cardvotes->hasPages())
                            {{ $cardvotes->appends(request()->query())->links('vendor.pagination.custom') }}
                        @else
                            <div class="flex items-center justify-between">
                                <nav class="flex justify-start">
                                    <div class="text-sm flex gap-1">
                                        <div>Showing</div>
                                        <div class="font-bold">1</div>
                                        <div>to</div>
                                        <div class="font-bold">{{ count($cardvotes) }}</div>
                                        <div>of</div>
                                        <div class="font-bold">{{ count($cardvotes) }}</div>
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
