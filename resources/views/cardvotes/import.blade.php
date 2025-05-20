<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import Card Vote') }}
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
            <a href="{{ route('cardvotes.index') }}"
                class="hover:bg-amber-100 border border-amber-500 text-amber-500 px-4 py-2 rounded-3xl">Back</a>
            <form action="{{ route('cardvotes.import_store') }}" method="post" enctype="multipart/form-data"
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
                    <div class="mb-1 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>User <span class="text-red-500 text-xs">*
                            </span></span>
                    </div>
                    <input type="file" name="users" id="users" accept=".xlsx, .xls, .csv"
                        class="w-full border border-gray-300 rounded-3xl px-4 py-1" placeholder="User ....."
                        oninput="this.value = this.value.toUpperCase();">
                    @if ($errors->has('users'))
                        <span class="text-red-500">{{ $errors->first('users') }}</span>
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

                <button type="submit"
                    class="hover:bg-sky-100 px-4 py-2 border-2 border-sky-500 rounded-3xl text-sky-500">Create</button>
            </form>
            <div class="flex flex-col lg:flex-row gap-2 items-center">
                <div class="mt-4">
                    <a href="{{ asset('excel/kpu-lp3itasik-template-import-card-votes.xlsx') }}"
                        class="hover:bg-sky-100 px-4 py-2 border-2 border-sky-500 rounded-3xl text-sky-500"
                        download>Download Template</a>
                </div>
                <div class="font-bold mt-4 text-center lg:text-left"><span class="text-red-500">note:</span> rekomendasi jangan lebih dari 500 data
                    perorganisasi.</div>
            </div>
        </div>

    </div>
</x-app-layout>
