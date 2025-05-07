<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Periods') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('periods.create') }}">Create</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($periods as $key => $period)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $period->name }}</td>
                        <td>{{ $period->description }}</td>
                        <td>{{ $period->dateofvote }}</td>
                        <td>
                            <a href="{{ route('periods.edit', $period->id) }}">Edit</a>
                            <form action="{{ route('periods.destroy', $period->id) }}" method="POST" class="inline" onclick="return confirm('Are you sure you want to delete this item?');">
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
