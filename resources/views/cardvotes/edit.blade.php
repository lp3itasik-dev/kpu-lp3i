<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Card Vote') }}
        </h2>
    </x-slot>

    <div class="py-12">
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
                </div>
                <div>
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id">
                        <option value="{{ $cardvote->user_id }}">{{ $cardvote->user->name }}</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="organization_id">Organization</label>
                    <select name="organization_id" id="organization_id">
                        <option value="{{ $cardvote->organization_id }}">{{ $cardvote->organization->name }}</option>
                        @foreach ($organizations as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
