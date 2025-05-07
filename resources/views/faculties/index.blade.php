<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Faculties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('faculties.create') }}">Create</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Dean</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($faculties as $key => $faculty)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $faculty->name }}</td>
                        <td>{{ $faculty->dean }}</td>
                        <td>{{ $faculty->is_active ? 'Active' : 'Non Active' }}</td>
                        <td>
                            <a href="{{ route('faculties.edit', $faculty->id) }}">Edit</a>
                            <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST" class="inline" onclick="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5">Not found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
