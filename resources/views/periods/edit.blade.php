<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Period') }}
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
