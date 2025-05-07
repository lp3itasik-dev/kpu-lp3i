<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('candidates.create') }}">Create</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
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
                        <td>{{ $candidate->organization_id }}</td>
                        <td>{{ $candidate->name }}</td>
                        <td>{{ $candidate->description }}</td>
                        <td>{{ $candidate->vision }}</td>
                        <td>{{ $candidate->mision }}</td>
                        <td>{{ $candidate->logo }}</td>
                        <td>{{ $candidate->video }}</td>
                        <td>{{ $candidate->is_active ? 'Active' : 'Non Active' }}</td>
                        <td>
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
