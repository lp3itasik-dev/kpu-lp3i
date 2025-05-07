<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Period') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('periods.index') }}">Back</a>
            <form action="{{ route('periods.update', $period->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $period->name }}" required>
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" value="{{ $period->description }}" required>
                </div>
                <div>
                    <label for="dateofvote">Date</label>
                    <input type="date" name="dateofvote" id="dateofvote" value="{{ $period->dateofvote }}" required>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
