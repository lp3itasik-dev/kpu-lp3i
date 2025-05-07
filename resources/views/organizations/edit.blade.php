<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edut Organization') }}
        </h2>
    </x-slot>

    <div class="py-12">
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
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $organization->name }}" required>
                </div>
                <div>
                    <label for="logo">Logo</label>
                    <input type="text" name="logo" id="logo" value="{{ $organization->logo }}" required>
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description"  value="{{ $organization->description }}" required>
                </div>
                <div>
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active">
                        <option value="1" {{ $organization->is_active ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$organization->is_active ? 'selected' : '' }}>Non Active</option>
                    </select>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
