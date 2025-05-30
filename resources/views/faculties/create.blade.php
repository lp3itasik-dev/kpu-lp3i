<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Faculty') }}
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
            <a href="{{ route('faculties.index') }}">Back</a>
            <form action="{{ route('faculties.store') }}" method="post">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                    @if ($errors->has('name'))
                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div>
                    <label for="dean">Dean</label>
                    <input type="text" name="dean" id="dean" required>
                    @if ($errors->has('dean'))
                        <span class="text-red-500">{{ $errors->first('dean') }}</span>
                    @endif
                </div>
                <div>
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active">
                        <option value="1">Active</option>
                        <option value="0">Non Active</option>
                    </select>
                    @if ($errors->has('is_active'))
                        <span class="text-red-500">{{ $errors->first('is_active') }}</span>
                    @endif
                </div>
                <button type="submit">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>
