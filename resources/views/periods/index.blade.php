<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Periods') }}
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
            <div class="mt-4 w-32">
                <a href="{{ route('periods.create') }}" class="href rounded-xl flex items-center justify-center  p-2 text-sm lg:text-md hover:bg-sky-100 border border-dashed border-sky-500 text-sky-500 pl-4 pr-4 pt-2">Create</a>
            </div>
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
