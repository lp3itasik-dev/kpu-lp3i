<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Organizations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('organizations.create') }}">Create</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Program</th>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($organizations as $key => $organization)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $organization->program->name ?? 'Unknown' }}</td>
                        <td>{{ $organization->name }}</td>
                        <td>{{ $organization->logo }}</td>
                        <td>{{ $organization->description }}</td>
                        <td>{{ $organization->is_active ? 'Active' : 'Non Active' }}</td>
                        <td>
                            <a href="{{ route('organizations.edit', $organization->id) }}">Edit</a>
                            <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST" class="inline" onclick="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="7">Not found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
