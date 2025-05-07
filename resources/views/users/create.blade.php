<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('users.index') }}">Back</a>
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div>
                    <label for="role">Status</label>
                    <select name="role" id="role">
                        <option value="A">Administrator</option>
                        <option value="O">Officer</option>
                        <option value="U">User</option>
                    </select>
                </div>
                <div>
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active">
                        <option value="1">Active</option>
                        <option value="0">Non Active</option>
                    </select>
                </div>
                <button type="submit">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>
