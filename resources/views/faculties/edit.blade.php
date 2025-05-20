<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Faculty') }}
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
            <a href="{{ route('faculties.index') }}" class="border-2 border-red-500 border-dashed px-4 py-2 hover:bg-red-50 text-red-500 rounded-xl">Back</a>
            <form action="{{ route('faculties.update', $faculty->id) }}" method="post" class="bg-white p-6 rounded-3xl shadow-xl">
                @csrf
                @method('PATCH')
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Name<span class="text-red-500">*</span></span>
                    </div>
                    <input type="text" name="name" id="name" value="{{ $faculty->name }}" class="w-full border border-gray-300 rounded-3xl px-4" required>
                    @if ($errors->has('name'))
                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Dean<span class="text-red-500">*</span></span>
                    </div>
                    <input type="text" name="dean" id="dean" value="{{ $faculty->dean }}" class="w-full border border-gray-300 rounded-3xl px-4" required>
                    @if ($errors->has('dean'))
                        <span class="text-red-500">{{ $errors->first('dean') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Status<span class="text-red-500">*</span></span>
                    </div>
                    <select name="is_active" id="is_active" class="js-example-placeholder-single js-states form-control w-full border border-gray-300 rounded-3xl px-4">
                        <option value="1" {{ $faculty->is_active ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$faculty->is_active ? 'selected' : '' }}>Non Active</option>
                    </select>
                    @if ($errors->has('is_active'))
                        <span class="text-red-500">{{ $errors->first('is_active') }}</span>
                    @endif
                </div>
                <button type="submit" class="hover:bg-sky-100 px-4 py-2 border-2 border-sky-500 rounded-3xl text-sky-500">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
