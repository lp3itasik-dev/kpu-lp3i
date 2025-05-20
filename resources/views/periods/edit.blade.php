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
        <div class="max-w-7xl lg:mx-auto mx-5 sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('periods.index') }}" class="border-2 border-red-500 border-dashed px-4 py-2 hover:bg-red-50 text-red-500 rounded-xl">Back</a>
            <form action="{{ route('periods.update', $period->id) }}" method="post" class="bg-white p-6 rounded-3xl shadow-xl">
                @csrf
                @method('PATCH')
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Name<span class="text-red-500">*</span></span>
                    </div>
                    <input type="text" name="name" id="name" value="{{ $period->name }}" class="w-full border border-gray-300 rounded-3xl px-4 py-1" required>
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Description<span class="text-red-500">*</span></span>
                    </div>
                    <input type="text" name="description" id="description" value="{{ $period->description }}" class="w-full border border-gray-300 rounded-3xl px-4 py-1" required>
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Date<span class="text-red-500">*</span></span>
                    </div>
                    <input type="date" name="dateofvote" id="dateofvote" value="{{ $period->dateofvote }}" class="w-full border border-gray-300 rounded-3xl px-4 py-1" required>
                </div>
                <button type="submit" class="hover:bg-sky-100 px-4 py-2 border-2 border-sky-500 rounded-3xl text-sky-500">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
