<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Candidate') }}
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
            <a href="{{ route('candidates.index') }}"
                class="border-2 border-red-500 border-dashed px-4 py-2 hover:bg-red-50 text-red-500 rounded-xl">Back</a>
            <form action="{{ route('candidates.store') }}" method="post" enctype="multipart/form-data"
                class="bg-white p-6 rounded-3xl shadow-xl">
                @csrf
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Period<span class="text-red-500">*</span></span>
                    </div>
                    <select
                        class="js-example-placeholder-single js-states form-control w-full border border-gray-300 rounded-3xl px-4"
                        name="period_id" id="period_id" data-placeholder="Period">
                        <option value="">Pilih...</option>
                        @foreach ($periods as $period)
                            <option value="{{ $period->id }}">{{ $period->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('period_id'))
                        <span class="text-red-500">{{ $errors->first('period_id') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Organization<span class="text-red-500">*</span></span>
                    </div>
                    <select
                        class="js-example-placeholder-single js-states form-control w-full border border-gray-300 rounded-3xl px-4"
                        name="organization_id" id="organization_id" data-placeholder="Organization">
                        <option value="">Pilih...</option>
                        @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('organization_id'))
                        <span class="text-red-500">{{ $errors->first('organization_id') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Name<span class="text-red-500">*</span></span>
                    </div>
                    <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-3xl px-4" required>
                    @if ($errors->has('name'))
                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Description<span class="text-red-500">*</span></span>
                    </div>
                    <input type="text" name="description" id="description" class="w-full border border-gray-300 rounded-3xl px-4" required>
                    @if ($errors->has('description'))
                        <span class="text-red-500">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Vision<span class="text-red-500">*</span></span>
                    </div>
                    <input type="text" name="vision" id="vision" class="w-full border border-gray-300 rounded-3xl px-4" required>
                    @if ($errors->has('vision'))
                        <span class="text-red-500">{{ $errors->first('vision') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Mission<span class="text-red-500">*</span></span>
                    </div>
                    <input type="text" name="mision" id="mision" class="w-full border border-gray-300 rounded-3xl px-4" required>
                    @if ($errors->has('mision'))
                        <span class="text-red-500">{{ $errors->first('mision') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Logo<span class="text-red-500">*</span></span>
                    </div>
                    <input type="file" name="logo" class="w-full border border-gray-300 rounded-3xl px-4 py-1" id="logo">
                    @if ($errors->has('logo'))
                        <span class="text-red-500">{{ $errors->first('logo') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Video<span class="text-red-500">*</span></span>
                    </div>
                    <input type="text" name="video" id="video" class="w-full border border-gray-300 rounded-3xl px-4">
                    @if ($errors->has('video'))
                        <span class="text-red-500">{{ $errors->first('video') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Status<span class="text-red-500">*</span></span>
                    </div>
                    <select name="is_active" id="is_active" class="js-example-placeholder-single js-states form-control w-full border border-gray-300 rounded-3xl px-4" eholder="Period">
                        <option value="">Pilih...</option>
                        <option value="1">Active</option>
                        <option value="0">Non Active</option>
                    </select>
                    @if ($errors->has('is_active'))
                        <span class="text-red-500">{{ $errors->first('is_active') }}</span>
                    @endif
                </div>
                <button type="submit" class="hover:bg-sky-100 px-4 py-2 border-2 border-sky-500 rounded-3xl text-sky-500">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>
