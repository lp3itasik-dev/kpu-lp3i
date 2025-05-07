<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Period') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('periods.index') }}">Back</a>
            <form action="{{ route('periods.store') }}" method="post">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" required>
                </div>
                <div>
                    <label for="dateofvote">Date</label>
                    <input type="date" name="dateofvote" id="dateofvote" required>
                </div>
                <button type="submit">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>
