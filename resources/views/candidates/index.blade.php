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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('candidates.create') }}">Create</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Period</th>
                        <th>Organization</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Vision</th>
                        <th>Mision</th>
                        <th>Logo</th>
                        <th>Video</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($candidates as $key => $candidate)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $candidate->period->name ?? 'Unknown' }}</td>
                        <td>{{ $candidate->organization->name ?? 'Unknown' }}</td>
                        <td>{{ $candidate->name }}</td>
                        <td>{{ $candidate->description }}</td>
                        <td>{{ $candidate->vision }}</td>
                        <td>{{ $candidate->mision }}</td>
                        <td>{{ $candidate->logo }}</td>
                        <td>{{ $candidate->video }}</td>
                        <td>{{ $candidate->is_active ? 'Active' : 'Non Active' }}</td>
                        <td>
                            <a href="{{ route('candidates.show', $candidate->id) }}">Show</a>
                            <a href="{{ route('candidates.edit', $candidate->id) }}">Edit</a>
                            <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" class="inline" onclick="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="10">Not found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
