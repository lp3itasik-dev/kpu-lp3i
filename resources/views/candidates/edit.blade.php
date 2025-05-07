<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Candidate') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('candidates.index') }}">Back</a>
            <form action="{{ route('candidates.update', $candidate->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div>
                    <label for="organization_id">Organization</label>
                    <select name="organization_id" id="organization_id">
                        @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $candidate->name }}" required>
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" value="{{ $candidate->description }}" required>
                </div>
                <div>
                    <label for="vision">Vision</label>
                    <input type="text" name="vision" id="vision" value="{{ $candidate->vision }}" required>
                </div>
                <div>
                    <label for="mission">Mission</label>
                    <input type="text" name="mision" id="mision" value="{{ $candidate->mision }}" required>
                </div>
                <div>
                    <label for="logo">Logo</label>
                    <input type="text" name="logo" id="logo" value="{{ $candidate->logo }}" required>
                </div>
                <div>
                    <label for="video">Video</label>
                    <input type="text" name="video" id="video" value="{{ $candidate->video }}" required>
                </div>
                <div>
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active">
                        <option value="1" {{ $candidate->is_active ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$candidate->is_active ? 'selected' : '' }}>Non Active</option>
                    </select>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
