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

        <div class="max-w-7xl lg:mx-auto mx-5 sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('users.index') }}" class="border-2 border-red-500 border-dashed px-4 py-2 hover:bg-red-50 text-red-500 rounded-xl">Back</a>
            <form action="{{ route('users.update', $user->id) }}" method="post" class="bg-white p-6 rounded-3xl shadow-xl">
                @csrf
                @method('PATCH')
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Name<span class="text-red-500">*</span></span>
                    </div>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full border border-gray-300 rounded-3xl px-4" required>
                    @if ($errors->has('name'))
                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Email<span class="text-red-500">*</span></span>
                    </div>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="w-full border border-gray-300 rounded-3xl px-4" required>
                    @if ($errors->has('email'))
                        <span class="text-red-500">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Password<span class="text-red-500">*</span></span>
                    </div>
                    <input type="password" name="password" id="password" value="" class="w-full border border-gray-300 rounded-3xl px-4" required>
                    @if ($errors->has('password'))
                        <span class="text-red-500">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Confirm Password<span class="text-red-500">*</span></span>
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation" value="" class="w-full border border-gray-300 rounded-3xl px-4" required>
                    @if ($errors->has('password'))
                        <span class="text-red-500">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Role<span class="text-red-500">*</span></span>
                    </div>
                    <select name="role" id="role" class="js-example-placeholder-single js-states form-control w-full border border-gray-300 rounded-3xl px-4">
                        <option value="A" {{ $user->role == 'A' ? 'selected' : '' }}>Administrator</option>
                        <option value="O" {{ $user->role == 'O' ? 'selected' : '' }}>Officer</option>
                        <option value="U" {{ $user->role == 'U' ? 'selected' : '' }}>User</option>
                    </select>
                    @if ($errors->has('role'))
                    <span class="text-red-500">{{ $errors->first('role') }}</span>
                @endif
                </div>
                <div class="mb-5">
                    <div class="mb-2 text-md font-medium text-gray-900 dark:text-white flex items-center gap-3">
                        <span>Status<span class="text-red-500">*</span></span>
                    </div>
                    <select name="is_active" id="is_active" class="js-example-placeholder-single js-states form-control w-full border border-gray-300 rounded-3xl px-4">
                        <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>Non Active</option>
                    </select>
                    @if ($errors->has('is_active'))
                    <span class="text-red-500">{{ $errors->first('is_active') }}</span>
                @endif
                </div>
                <button type="submit" class="hover:bg-sky-100 px-4 py-2 border-2 border-sky-500 rounded-3xl text-sky-500">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
