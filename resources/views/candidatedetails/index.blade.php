<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidate Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Candidate</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($candidatedetails as $key => $candidate)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $candidate->candidate_id }}</td>
                        <td>{{ $candidate->name }}</td>
                        <td>{{ $candidate->description }}</td>
                        <td>{{ $candidate->is_active ? 'Active' : 'Non Active' }}</td>
                        <td>
                            <a href="{{ route('candidatedetails.edit', $candidate->id) }}">Edit</a>
                            <form action="{{ route('candidatedetails.destroy', $candidate->id) }}" method="POST" class="inline" onclick="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6">Not found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
