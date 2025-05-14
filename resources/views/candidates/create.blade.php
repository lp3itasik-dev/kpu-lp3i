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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('candidates.index') }}">Back</a>
            <form action="{{ route('candidates.store') }}" method="post">
                @csrf
                <div>
                    <label for="period_id">Periods</label>
                    <select name="period_id" id="period_id">
                        @foreach ($periods as $period)
                            <option value="{{ $period->id }}">{{ $period->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('period_id'))
                        <span class="text-red-500">{{ $errors->first('period_id') }}</span>
                    @endif
                </div>
                <div>
                    <label for="organization_id">Organization</label>
                    <select name="organization_id" id="organization_id">
                        @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('organization_id'))
                        <span class="text-red-500">{{ $errors->first('organization_id') }}</span>
                    @endif
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                    @if ($errors->has('name'))
                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" required>
                    @if ($errors->has('description'))
                        <span class="text-red-500">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div>
                    <label for="vision">Vision</label>
                    <input type="text" name="vision" id="vision" required>
                    @if ($errors->has('vision'))
                        <span class="text-red-500">{{ $errors->first('vision') }}</span>
                    @endif
                </div>
                <div>
                    <label for="mision">Mission</label>
                    <input type="text" name="mision" id="mision" required>
                    @if ($errors->has('mision'))
                        <span class="text-red-500">{{ $errors->first('mision') }}</span>
                    @endif
                </div>
                <div>
                    <label for="logo">Logo</label>
                    <input type="text" name="logo" id="logo" required>
                    @if ($errors->has('logo'))
                        <span class="text-red-500">{{ $errors->first('logo') }}</span>
                    @endif
                </div>
                <div>
                    <label for="video">Video</label>
                    <input type="text" name="video" id="video" required>
                    @if ($errors->has('video'))
                        <span class="text-red-500">{{ $errors->first('video') }}</span>
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
