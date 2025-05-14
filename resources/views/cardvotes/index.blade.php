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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('cardvotes.create') }}">Create</a>
            <a href="{{ route('cardvotes.import') }}">Import</a>
            <table>
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
                            <form action="{{ route('cardvotes.destroy', $cardvote->id) }}" method="POST" class="inline" onclick="return confirm('Are you sure you want to delete this item?');">
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
            </table>
        </div>
    </div>
</x-app-layout>
