<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
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
            <a href="{{ route('users.index') }}">Back</a>
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                    @if ($errors->has('name'))
                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required>
                    @if ($errors->has('email'))
                        <span class="text-red-500">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="" required>
                    @if ($errors->has('password'))
                        <span class="text-red-500">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" value="" required>
                    @if ($errors->has('password'))
                        <span class="text-red-500">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div>
                    <label for="role">Status</label>
                    <select name="role" id="role">
                        <option value="A" {{ $user->role == 'A' ? 'selected' : '' }}>Administrator</option>
                        <option value="O" {{ $user->role == 'O' ? 'selected' : '' }}>Officer</option>
                        <option value="U" {{ $user->role == 'U' ? 'selected' : '' }}>User</option>
                    </select>
                    @if ($errors->has('role'))
                    <span class="text-red-500">{{ $errors->first('role') }}</span>
                @endif
                </div>
                <div>
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active">
                        <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>Non Active</option>
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
