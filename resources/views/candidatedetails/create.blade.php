<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Candidate Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <a href="{{ route('candidates.index') }}">Back</a>
            <form action="{{ route('candidatedetails.store') }}" method="post">
                @csrf
                <div>
                    <label for="candidate_id">Candidate</label>
                    <select name="candidate_id" id="candidate_id">
                        @foreach ($candidates as $candidate)
                            <option value="{{ $candidate->id }}">{{ $candidate->name }} ({{ $candidate->period->name }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" required>
                </div>
                <button type="submit">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>
