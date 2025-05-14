<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edut Organization') }}
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
            <a href="{{ route('organizations.index') }}">Back</a>
            <form action="{{ route('organizations.update', $organization->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div>
                    <label for="program_id">Program</label>
                    <select name="program_id" id="program_id">
                        <option value="{{ $organization->program_id }}">{{ $organization->program->name }}</option>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('program_id'))
                        <span class="text-red-500">{{ $errors->first('program_id') }}</span>
                    @endif
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $organization->name }}" required>
                    @if ($errors->has('name'))
                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div>
                    <label for="logo">Logo</label>
                    <input type="text" name="logo" id="logo" value="{{ $organization->logo }}" required>
                    @if ($errors->has('logo'))
                        <span class="text-red-500">{{ $errors->first('logo') }}</span>
                    @endif
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description"  value="{{ $organization->description }}" required>
                    @if ($errors->has('description'))
                        <span class="text-red-500">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div>
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active">
                        <option value="1" {{ $organization->is_active ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$organization->is_active ? 'selected' : '' }}>Non Active</option>
                    </select>
                    @if ($errors->has('is_active'))
                        <span class="text-red-500">{{ $errors->first('is_active') }}</span>
                    @endif
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
