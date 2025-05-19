<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Card Vote') }}
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
        <div class="max-w-7xl lg:mx-auto sm:px-6 lg:px-8 space-y-6 mx-5">
            <a href="{{ route('cardvotes.index') }}"
                class="border-2 border-red-500 border-dashed px-4 py-2 hover:bg-red-50 text-red-500 rounded-xl">Back</a>
            <form action="{{ route('cardvotes.store') }}" method="post" class="bg-white p-6 rounded-3xl shadow-xl">
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
                        <span>User<span class="text-red-500">*</span></span>
                    </div>
                    <select
                        class="js-example-placeholder-single js-states form-control w-full border border-gray-300 rounded-3xl px-4"
                        name="period_id" id="period_id" data-placeholder="Period">
                        <option value="">Pilih...</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('user_id'))
                        <span class="text-red-500">{{ $errors->first('user_id') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Organization<span class="text-red-500">*</span></span>
                    </div>
                    <select
                        class="js-example-placeholder-single js-states form-control w-full border border-gray-300 rounded-3xl px-4"
                        name="period_id" id="period_id" data-placeholder="Period">
                        <option value="">Pilih...</option>
                        @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('organization_id'))
                        <span class="text-red-500">{{ $errors->first('organization_id') }}</span>
                    @endif
                </div>

                <button type="submit" class="hover:bg-sky-100 px-4 py-2 border-2 border-sky-500 rounded-3xl text-sky-500">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>
