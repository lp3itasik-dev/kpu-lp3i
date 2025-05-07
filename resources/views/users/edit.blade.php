<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('users.index') }}">Back</a>
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="{{ $user->password }}" required>
                </div>
                <div>
                    <label for="role">Status</label>
                    <select name="role" id="role">
                        <option value="A" {{ $user->role == 'A' ? 'selected' : '' }}>Administrator</option>
                        <option value="O" {{ $user->role == 'O' ? 'selected' : '' }}>Officer</option>
                        <option value="U" {{ $user->role == 'U' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
                <div>
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active">
                        <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>Non Active</option>
                    </select>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
