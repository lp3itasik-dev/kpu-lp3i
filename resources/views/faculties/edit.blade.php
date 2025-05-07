<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Faculty') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('faculties.index') }}">Back</a>
            <form action="{{ route('faculties.update', $faculty->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $faculty->name }}" required>
                </div>
                <div>
                    <label for="dean">Dean</label>
                    <input type="text" name="dean" id="dean" value="{{ $faculty->dean }}" required>
                </div>
                <div>
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active">
                        <option value="1" {{ $faculty->is_active ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$faculty->is_active ? 'selected' : '' }}>Non Active</option>
                    </select>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
