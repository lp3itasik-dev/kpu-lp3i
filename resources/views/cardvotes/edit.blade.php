<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Card Vote') }}
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
            <a href="{{ route('cardvotes.index') }}">Back</a>
            <form action="{{ route('cardvotes.update', $cardvote->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div>
                    <label for="period_id">Period</label>
                    <select name="period_id" id="period_id">
                        <option value="{{ $cardvote->period_id }}">{{ $cardvote->period->name }}</option>
                        @foreach ($periods as $period)
                            <option value="{{ $period->id }}">{{ $period->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('period_id'))
                        <span class="text-red-500">{{ $errors->first('period_id') }}</span>
                    @endif
                </div>
                <div>
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id">
                        <option value="{{ $cardvote->user_id }}">{{ $cardvote->user->name }}</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('user_id'))
                        <span class="text-red-500">{{ $errors->first('user_id') }}</span>
                    @endif
                </div>
                <div>
                    <label for="organization_id">Organization</label>
                    <select name="organization_id" id="organization_id">
                        <option value="{{ $cardvote->organization_id }}">{{ $cardvote->organization->name }}</option>
                        @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('organization_id'))
                        <span class="text-red-500">{{ $errors->first('organization_id') }}</span>
                    @endif
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
