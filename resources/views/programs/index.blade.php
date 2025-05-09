<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Programs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('programs.create') }}">Create</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Faculty</th>
                        <th>Name</th>
                        <th>Head</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($programs as $key => $program)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $program->faculty->name ?? 'Unknown' }}</td>
                        <td>{{ $program->name }}</td>
                        <td>{{ $program->head }}</td>
                        <td>{{ $program->is_active ? 'Active' : 'Non Active' }}</td>
                        <td>
                            <a href="{{ route('programs.edit', $program->id) }}">Edit</a>
                            <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="inline" onclick="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
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
